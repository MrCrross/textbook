<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabMission extends Model
{
    use HasFactory;

    protected $fillable = [
        'lab_id',
        'name',
        'queue'
    ];

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }

    public function steps()
    {
        return $this->hasMany(MissionStep::class);
    }
}
