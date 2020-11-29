<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // This optional for default database connection
    public $connection = "mysql";

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'note',
    ];
}
