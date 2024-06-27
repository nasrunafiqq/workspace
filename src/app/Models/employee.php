<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $fillable = ['user_name','user_id','company_id'];
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Employer()
    {
        return $this->belongsTo(Company::class);
    }

    public function Post()
    {
        return $this->hasMany(Post::class);
    }

    public function Comment()
    {
        return $this->hasMany(comment::class);
    }

}
