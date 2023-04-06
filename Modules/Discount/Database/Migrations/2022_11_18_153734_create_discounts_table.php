<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Discount\Enums\DiscountStatusEnum;
use Modules\Discount\Enums\DiscountTypeEnum;

return new class() extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('code')->nullable();
            $table->string('link', 300)->nullable();
            $table->string('description')->nullable();
            $table->bigInteger('usage_limitation')->nullable()->unsigned(); // null means unlimited
            $table->bigInteger('uses')->default(0)->unsigned();
            $table->tinyInteger('percent')->unsigned();
            $table->timestamp('expire_at')->nullable();
            $table->enum('status', get_value_enums(DiscountStatusEnum::cases()))
                ->default(DiscountStatusEnum::STATUS_ACTIVE->value);
            $table->enum('type', get_value_enums(DiscountTypeEnum::cases()))
                ->default(DiscountTypeEnum::TYPE_ALL->value);
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
        Schema::dropIfExists('discounts');
    }
};
