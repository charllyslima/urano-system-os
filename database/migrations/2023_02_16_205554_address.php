<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('address', 250);
            $table->string('number', 10);
            $table->string('district', 50);
            $table->string('zipcode', 8);
            $table->string('complement', 50);
            $table->foreignId('fk_city')
                ->constrained('city')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('address', function (Blueprint $table) {
            $table->dropForeign('fk_city');
        });
    }
};
