<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Post()
    {
        return $this->hasMany(Post::class);
    }

    public function Employee()
    {
        return $this->hasMany(employee::class);
    }
}
