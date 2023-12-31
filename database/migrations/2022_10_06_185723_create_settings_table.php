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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('email',255);
            $table->string('phone',30);
            $table->string('facebook',255)->nullable();
            $table->string('whatsape',255)->nullable();
            $table->string('twitter',255)->nullable();
            $table->string('instegram',255)->nullable();
            $table->string('linkedin',255)->nullable();
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
        Schema::dropIfExists('settings');
    }
};
