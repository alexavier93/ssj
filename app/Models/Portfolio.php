<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolio';

    /**
     * The attributes that are mass assignable.
     *
     * @var array 
     */

    protected $fillable = [
        'nome',
        'image',
        'thumbnail',
        'slug',
        'status',
    ];


    public function galeria()
    {
        return $this->hasMany(ServicoGaleria::class);
    }

}
