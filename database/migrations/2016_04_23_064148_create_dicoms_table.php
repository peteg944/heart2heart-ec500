<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDicomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dicoms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id'); // Patient this belongs to
            $table->double('actual_edv');
            $table->double('actual_esv');
            $table->double('predicted_edv');
            $table->double('predicted_esv');
            $table->double('ef');
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
        Schema::drop('dicoms');
    }
}
