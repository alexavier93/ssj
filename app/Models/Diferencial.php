<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diferencial extends Model
{
    use HasFactory;

    protected $table = 'diferenciais';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
    ];


    public function imoveis()
    {
        return $this->belongsToMany(Imovel::class, 'imoveis_diferenciais');
    }

}
