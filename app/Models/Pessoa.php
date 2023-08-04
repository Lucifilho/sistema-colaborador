<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [

        'Ramal',
        'Nome',
        'Whatsapp',
        'Departamento',
        'Unidade'
    ];

    protected $casts = [

        'items' => 'array'
    ];

    protected $dates = ['date'];

    protected $guarded = [];

    public function scopeSearch($query, $term){

        $term = "%$term%";
        $query-> where(function($query) use ($term){
            $query->where('Nome','LIKE',$term)
                ->orWhere('Unidade','LIKE',$term);
        });
    }
}
