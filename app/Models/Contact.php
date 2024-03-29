<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subject',
        'email',
        'context',
        'replay_flag',
        'replay_text',
        'created_at'
    ];
}
