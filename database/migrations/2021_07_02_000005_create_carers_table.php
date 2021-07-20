<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarersTable extends Migration
{
    public function up()
    {
        Schema::create('carers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->string('post_code');
            $table->string('contact_number');
            $table->string('work_contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('relationship_type')->nullable();
            $table->string('national_insurance_number')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
