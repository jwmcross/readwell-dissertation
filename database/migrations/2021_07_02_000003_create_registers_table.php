<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistersTable extends Migration
{
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->date('register_date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('age_group')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
