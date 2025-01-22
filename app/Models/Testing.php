<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testing extends Model
{
    public function products()
    {
        return $this->belongsTo(Product::class); // 'testing_id' is the foreign key in the products table
    }
}
