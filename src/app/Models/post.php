<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id','content','company_id'];

    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function Picture()
    {
    return $this->hasMany(Picture::class);
    }

    public function Comment()
    {
        return $this->hasMany(comment::class);
    }
}
