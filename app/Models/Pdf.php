<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Pdf extends Model
{
   

    protected $fillable = [
        'name', 'price', 'image', 'description', 'pdf_path'
    ];

    // Additional model methods or relationships can be defined here
}

