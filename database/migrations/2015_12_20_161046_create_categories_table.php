<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->boolean('active')->default(false);            
            $table->integer('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('categories');            
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::drop('categories');
    }
}
