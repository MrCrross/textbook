<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    protected $fillable = [
        'header_id',
        'name',
        'queue'
    ];

    public function header()
    {
        return $this->belongsTo(Header::class);
    }

    public function missions()
    {
        return $this->hasMany(LabMission::class);
    }

}
