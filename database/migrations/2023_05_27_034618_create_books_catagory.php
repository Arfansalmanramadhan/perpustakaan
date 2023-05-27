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
        Schema::create('books_catagory', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("book_id");
            $table->foreign('book_id')->references('id')->on('books');
            $table->unsignedBigInteger("catagory_id");
            $table->foreign('catagory_id')->references('id')->on('catagories');
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
        Schema::dropIfExists('books_catagory');
    }
};
