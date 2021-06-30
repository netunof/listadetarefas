<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarefa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nome', 'descricao', 'status',
    ];

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'tag_tarefa', 'user_id', 'tag_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'tarefa_user');
    }

}
