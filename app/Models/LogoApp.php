<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogoApp extends Model
{
    use HasFactory;
    protected $table = "logoapp";
    protected $fillable = [
        'url'
    ];
}
