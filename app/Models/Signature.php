<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    protected $fillable = [

        'name',

        'position',

        'department',

        'phone',

        'email',

        'path',

        'created_by'

    ];

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
