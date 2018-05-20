<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookShortageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_shortage', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('b_itemid')->unsigned()->references('b_itemid')->on('books');
            $table->integer('sem_id')->unsigned()->references('sem_id')->on('semesters');
            $table->integer('predicted_qty');
            $table->integer('supply_qty');
            $table->float('shortage_percentage');
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
        Schema::dropIfExists('book_shortage');
    }
}
