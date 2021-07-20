<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildSignOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_sign_outs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_id')->nullable()->constrained();
            $table->foreignId('register_id')->nullable()->constrained();
            $table->foreignId('carer_id')->nullable()->constrained();
            $table->time('sign_out_time')->nullable();
            $table->string('staff_initial')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('child_sign_outs');
    }
}
