<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImovelStatus extends Model
{
    use HasFactory;

    protected $table = 'imoveis_status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imovel_id',
        'status_id',
        'porcentagem',
        
    ];

    public $timestamps = false;

    public function status()
    {
        return $this->belongsToMany(Status::class);
    }
}
