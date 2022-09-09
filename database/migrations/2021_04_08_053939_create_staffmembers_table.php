<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffmembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffmembers', function (Blueprint $table) {
            $table->id();
            $table->longText('reg_no');           
            $table->string('staff_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('gender')->nullable();
            $table->bigInteger('contact')->nullable();    
            $table->string('address')->nullable();            
            $table->string('registration_date')->nullable();

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
        Schema::dropIfExists('staffmembers');
    }
}
