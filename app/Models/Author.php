<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';
    protected $primaryKey = 'id';


    protected $fillable = [
        'name',
        'date_of_birh',
        'place_of_birth',
        'gender',
        'email',
        'hp'
    ];
}
