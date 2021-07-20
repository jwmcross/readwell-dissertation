<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildRegisterPivotTable extends Migration
{
    public function up()
    {
        Schema::create('child_register', function (Blueprint $table) {
            $table->id();
            $table->string('session');
            $table->time('in_time')->nullable();
            $table->time('out_time')->nullable();
            $table->string('absence')->nullable();
            $table->unsignedBigInteger('register_id');
            $table->foreign('register_id', 'register_id_fk_4298401')->references('id')->on('registers')->onDelete('cascade');
            $table->unsignedBigInteger('child_id');
            $table->foreign('child_id', 'child_id_fk_4298401')->references('id')->on('children')->onDelete('cascade');
            $table->timestamps();
            //$table->softDeletes();
        });
    }
}
