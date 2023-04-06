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
        Schema::create('advertisings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('media_id')->nullable()->constrained('medias')->nullOnDelete();
            $table->string('link')->nullable();
            $table->string('title')->nullable();
            $table->enum('location', get_value_enums(Modules\Advertising\Enums\AdvertisingLocationEnum::cases()));
            $table->enum('status', get_value_enums(Modules\Advertising\Enums\AdvertisingStatusEnum::cases()));
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
        Schema::dropIfExists('advertisings');
    }
};
