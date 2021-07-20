<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCarersTable extends Migration
{
    public function up()
    {
        Schema::table('carers', function (Blueprint $table) {
            $table->unsignedBigInteger('family_id')->nullable();
            $table->foreign('family_id', 'family_fk_4297831')->references('id')->on('families');
        });
    }
}
