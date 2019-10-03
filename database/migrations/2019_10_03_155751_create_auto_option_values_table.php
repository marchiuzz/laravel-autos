<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoOptionValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_option_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('auto_id');
            $table->unsignedBigInteger('option_value_id');

            $table->unique(['auto_id', 'option_value_id']);

            $table->foreign('auto_id')->references('id')->on('autos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('option_value_id')->references('id')->on('option_values')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('auto_option_values')){

            Schema::table('auto_option_values', function(Blueprint $table){
                $table->dropForeign('auto_id');
                $table->dropForeign('option_value_id');
            });

        }

        Schema::dropIfExists('auto_option_values');
    }
}
