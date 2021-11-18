<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,
        'queue'
    ];

    public function labs()
    {
        return $this->hasMany(Lab::class);
    }

    public function themes()
    {
        return $this->hasMany(Theme::class);
    }
}
