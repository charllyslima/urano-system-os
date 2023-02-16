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
        Schema::create('permission', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fk_profile')
                ->constrained('profile')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('fk_feature')
                ->constrained('feature')
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
        Schema::dropIfExists('permission', function (Blueprint $table) {
            $table->dropForeign('fk_profile');
            $table->dropForeign('fk_feature');
        });
    }
};
