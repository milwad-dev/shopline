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
        Schema::create('discountables', static function (Blueprint $table) {
            $table->foreignId('discount_id');
            $table->foreignId('discountable_id');
            $table->string('discountable_type');
            $table->primary(['discount_id', 'discountable_id', 'discountable_type'], 'discountable_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discountables');
    }
};
