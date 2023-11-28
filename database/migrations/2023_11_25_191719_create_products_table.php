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
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('color_id');
            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
                ->onDelete('cascade');
                $table->foreign('size_id')
                ->references('id')
                ->on('sizes')
                ->onDelete('cascade');
                $table->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->onDelete('cascade');
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
