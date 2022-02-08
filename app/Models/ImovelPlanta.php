<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImovelPlanta extends Model
{
    use HasFactory;

    protected $table = 'imoveis_plantas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image', 'titulo', 'descricao', 'imovel_id'
    ];

    public $timestamps = false;

    public function imoveis()
    {
        return $this->belongsTo(Imovel::class);
    }
}
