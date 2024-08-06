<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create users table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        // Create stores table
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('store_name');
            $table->string('store_address');
            $table->string('store_city');
            $table->string('store_state');
            $table->string('store_zip');
            $table->decimal('store_longitude', 10, 8)->nullable();
            $table->decimal('store_latitude', 10, 8)->nullable();
            $table->timestamps();
        });

        // Create reports table
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->string('sku');
            $table->string('name');
            $table->string('shelf_position');
            $table->integer('facing');
            $table->integer('stock_level');
            $table->boolean('out_of_stock');
            $table->boolean('price_accuracy');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['open', 'pending', 'closed'])->default('open');
            $table->timestamp('check_in')->nullable();
            $table->timestamps();

            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
        Schema::dropIfExists('stores');
        Schema::dropIfExists('users');
    }
}