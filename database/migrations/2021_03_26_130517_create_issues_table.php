<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();            
            $table->longText('issue_id');
            $table->bigInteger('accno'); 
            $table->string('title')->nullable();
            $table->longText('reg_no');
            $table->string('name')->nullable();
            $table->string('department')->nullable();
            $table->string('member_type')->nullable();
            $table->date('issue_date');
            $table->date('due_date')->nullable();
            $table->date('return_date')->nullable();                        
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
        Schema::dropIfExists('issues');
    }
}
