<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingGroupParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        'working_group_id',
        'user_id',
        'role',
    ];
}