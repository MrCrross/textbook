<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'header_id',
        'name',
        'content'
    ];

    public function header()
    {
        return $this->belongsTo(Header::class);
    }

}
