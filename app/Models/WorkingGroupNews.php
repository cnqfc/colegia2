<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingGroupNews extends Model
{
    use HasFactory;

    protected $fillable = [
        'working_group_id',
        'title',
        'content',
        'created_by',
    ];
}
