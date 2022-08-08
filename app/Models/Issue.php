<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;
    protected $table = "category";
    protected $fillable = [
        'title',
        'description',
        'icon',
    ];
}
