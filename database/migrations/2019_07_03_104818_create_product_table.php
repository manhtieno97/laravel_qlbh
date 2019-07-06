<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('pro_id');
            $table->string('pro_name');
            $table->string('pro_slug');
            $table->integer('price');
            $table->string('img');
            $table->date('warranty');
            $table->string('accessories')->nullable();
            $table->string('promotion');
            $table->tinyInteger('pro_status');
            $table->text('description');
            $table->tinyInteger('featured');
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')
                  ->references('id')
                  ->on('category')
                  ->onDelete('cascade');
            $table->timestamps();
            $table->time('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
