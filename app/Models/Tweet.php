<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable =['content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //função callback verifica se o usuário está autenticado
    // e retorna o filtro com os likes apenas do usuário autenticado
    public function likes()
    {
        return $this->hasMany(Like::class)->where(function($query){
            if (auth()->check()) {
                $query->where('user_id', auth()->user()->id);
            }
        });
    }
}

