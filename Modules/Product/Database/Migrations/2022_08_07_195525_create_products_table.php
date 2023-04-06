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
        Schema::create('products', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('first_media_id')->nullable()->constrained('medias')->nullOnDelete();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('sku')->unique();
            $table->string('price');
            $table->string('count')->default(1);
            $table->string('type');
            $table->text('short_description');
            $table->enum('status', get_value_enums(Modules\Product\Enums\ProductStatusEnum::cases()));
            $table->longText('body');
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
        Schema::dropIfExists('products');
    }
};
