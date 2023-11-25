<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nameproduct', 255);
            $table->longtext('content')->nulladble();
            $table->unsignedBigInteger('menu_id');
            $table->integer('price');
            $table->string('hinhanhproduct');
            $table->integer('soluong');
<<<<<<<< HEAD:database/migrations/2023_11_23_131712_create_products_table.php
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('color_id');
========
            $table->string('color');
            $table->string('size');
>>>>>>>> 14c8c4377bfe06cae9eb74f5d9ef449e7eec4959:database/migrations/2023_11_23_123424_create_products_table.php
            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
                ->onDelete('cascade');
<<<<<<<< HEAD:database/migrations/2023_11_23_131712_create_products_table.php
                $table->foreign('size_id')
                ->references('id')
                ->on('sizes')
                ->onDelete('cascade');
                $table->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->onDelete('cascade');
========
>>>>>>>> 14c8c4377bfe06cae9eb74f5d9ef449e7eec4959:database/migrations/2023_11_23_123424_create_products_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
