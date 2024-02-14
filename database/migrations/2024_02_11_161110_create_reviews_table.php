<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->text('review');
            $table->tinyInteger('rating');
            $table->unsignedBigInteger('book_id'); //refers to the foreign key
            // $table->dateTime('created_at');
            // $table->dateTime('updated_at');

            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
