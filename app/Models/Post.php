<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    
    protected $fillable = [

         'titulo ' ,
         'autor ' ,
         'tipo ' ,
        ' tags ' ,
         'categorias ' ,
         'conteudo ' ,
         'imagePost'

    ];

    protected $casts = [

        'items' => 'array'
    ];

    protected $dates = ['date'];

    protected $guarded = [];

}
