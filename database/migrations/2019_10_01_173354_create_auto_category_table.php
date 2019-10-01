<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('auto_id');
            $table->unsignedBigInteger('category_id');
            $table->unique(['auto_id', 'category_id']);

            $table->foreign('auto_id')->references('id')->on('autos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('auto_category')){

            Schema::table('auto_category', function(Blueprint $table){
                $table->dropForeign(['auto_id']);
                $table->dropForeign(['category_id']);
            });

        }

        Schema::dropIfExists('auto_category');
    }
}
