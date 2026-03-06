<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $guarded = [];
    protected $casts = [
        'status' => 'string',
    ];

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }
}
