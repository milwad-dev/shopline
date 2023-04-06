<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('comment_id')->nullable()->constrained('comments')->nullOnDelete();
            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type', 50);
            $table->longText('body');
            $table->enum('status', get_value_enums(Modules\Comment\Enums\CommentStatusEnum::cases()))
                ->default(Modules\Comment\Enums\CommentStatusEnum::STATUS_NEW->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
