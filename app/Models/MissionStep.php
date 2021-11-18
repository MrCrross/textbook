<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'lab_mission_id',
        'name',
        'queue',
        'img'
    ];

    public function mission()
    {
        return $this->belongsTo(LabMission::class);
    }

}
