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
        Schema::create('failed_test', function (Blueprint $table) {
  $table->id('Failed_id');    
         $table->unsignedBigInteger('Test_id');
          $table->foreign('Test_id')->references('Test_id')->on('testings')->onDelete('cascade');
          $table->text('Failure_reason');
          $table->date('Remanufactured_date');
          $table->text('Remarks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('failed_test');
    }
};
