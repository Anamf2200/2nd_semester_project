<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
        protected $primaryKey = 'Product_Id';
        public $incrementing = true;
        protected $keyType = 'int';
    
        protected $fillable = [
            'Product_code', 'Bar_code', 'Revision_version', 
            'Manufacturing_number', 'Product_name', 
            'manufacturing_date', 'Status',
        ];
    }
