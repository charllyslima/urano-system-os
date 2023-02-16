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
        Schema::table('users', function (Blueprint $table) {
            $table->after('remember_token', function ($table){
                $table->foreignId('fk_profile')
                    ->constrained('profile')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
                $table->foreignId('fk_customer')
                    ->constrained('customer')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users', function (Blueprint $table) {
            $table->dropForeign('fk_profile');
            $table->dropForeign('fk_customer');
        });
    }
};
