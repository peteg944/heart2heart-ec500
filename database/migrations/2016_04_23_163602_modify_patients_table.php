<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add columns for new patient data
        Schema::table('patients', function($table) {
        	$table->integer('age');
        	$table->string('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Reverse the columns
        Schema::table('patients', function($table) {
        	$table->dropColumn('age');
        	$table->dropColumn('state');
        });
    }
}
