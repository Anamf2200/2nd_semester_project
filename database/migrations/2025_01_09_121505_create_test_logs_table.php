<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('test_logs', function (Blueprint $table) {
          $table->integer('Log_id')->primary()->autoIncrement();
          $table->string('Test_id',12);
          $table->foreign('Test_id')->references('Test_id')->on('testings')->onDelete('cascade');
          $table->integer('Department_id');
          $table->foreign('Department_id')->references('Department_id')->on('departments')->onDelete('cascade');
          $table->date('Test_date');
          $table->enum('Status',['Progress','Completed']);
          $table->text('Remarks');
        });

      
    }
    public function edit(){
            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_logs');
    }
};
