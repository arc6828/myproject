<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameRecoveredColumnToCovid19sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('covid19s', function (Blueprint $table) {
            $table->renameColumn('recoverd', 'recovered');        //เปลี่ยนชื่อ COLUMN
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('covid19s', function (Blueprint $table) {
            //
        });
    }
}
