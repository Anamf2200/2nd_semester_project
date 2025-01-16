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
        Schema::create('products', function (Blueprint $table) {
            $table->string('Product_Id', 10)->primary(); 
                     $table->string('Product_code',5);
         $table->string('Revision_version',3);
         $table->string('Manufacturing_number',5);
         $table->string('Product_name',100);
         $table->date('Manufacturing_date');
         $table->enum('Status',['Pending','Tested','Failed','Remanufactured'])->default('Pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
