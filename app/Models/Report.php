<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = "issue";
    protected $fillable = [
        'description-report',
        'categoryId',
        'lng',
        'lat',
         'image',
        'user_id',
         'state',
        'created_at',
    ];
}
