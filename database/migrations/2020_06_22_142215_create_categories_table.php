<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_name',20);
            $table->bigInteger('category_type_id')->unsigned();
            $table->foreign('category_type_id')->references('id')->on('category_types')->onDelete('cascade');
            $table->string('slug',30);
            $table->string('category_title',200);
            $table->string('description',1000);
            $table->string('photo',200);
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
        Schema::dropIfExists('categories');
    }
}
