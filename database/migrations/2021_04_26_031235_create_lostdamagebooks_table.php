<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLostdamagebooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lostdamagebooks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('accno');
            $table->string('title')->nullable();          
            $table->longText('reg_no');             
            $table->string('department')->nullable();
            $table->string('member_type')->nullable();
            $table->string('book_condition')->nullable();
            $table->double('fine', 15, 2)->default('0');

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
        Schema::dropIfExists('lostdamagebooks');
    }
}
