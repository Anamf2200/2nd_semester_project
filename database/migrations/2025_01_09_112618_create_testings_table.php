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
        Schema::create('testings', function (Blueprint $table) {
           $table->string('Test_id',12)->primary();
           $table->string('Product_id',10);
           $table->foreign('Product_id')->references('Product_Id')->on('products')->onDelete('cascade');
           $table->string('Test_type',50);
           $table->date('Test_date');
           $table->string('Tested_by',100);
           $table->text('Test_criteria');
           $table->enum('Test_result',['Pass','Fail']);
           $table->text('Remarks');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testings');
    }
};
