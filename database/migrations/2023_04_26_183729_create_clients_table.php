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
        Schema::create('app_clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_logo')->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_id');
            $table->string('client_key');
            $table->string('client_type')->nullable(); //ios/android/web
            $table->string('client_app_key')->nullable(); //
            $table->string('client_version')->nullable();
            $table->boolean('client_build_number')->nullable();
            $table->boolean('client_update_required')->nullable();
            $table->boolean('locked')->default(0);
            $table->integer('client_update_at')->default(0);
            $table->json('client_option')->nullable();
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
        Schema::dropIfExists('app_clients');
    }
};
