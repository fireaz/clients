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
        Schema::create('app_ads', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->nullable();
            $table->string('name')->nullable();
            $table->string('ads_id')->nullable();
            $table->string('ads_key')->nullable();
            $table->string('ads_size')->nullable();
            $table->string('ads_type')->nullable();
            $table->string('ads_image')->nullable();
            $table->string('ads_link')->nullable();
            $table->string('position')->nullable();//if null then random
            $table->string('view_type')->nullable(); //Link Banner Or Admob Or ...
            $table->string('client_type')->nullable(); //ios/android/web
            $table->dateTime('from_date')->nullable(); //
            $table->dateTime('to_date')->nullable();
            $table->boolean('locked')->default(0);
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
        Schema::dropIfExists('app_ads');
    }
};
