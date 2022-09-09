<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();           
            $table->longText('reg_no');
            $table->string('name')->nullable();
            $table->string('course')->nullable();
            $table->string('year')->nullable();
            $table->string('department')->nullable();
            $table->string('session')->nullable();
            $table->string('gender')->nullable(); 
            $table->string('registration_date')->nullable();
            $table->bigInteger('contact')->nullable();              
            $table->string('address')->nullable();

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
        Schema::dropIfExists('students');
    }
}
