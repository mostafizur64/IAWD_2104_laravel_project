<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use HasFactory;
    use SoftDeletes;

    function relatationTouser()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }
}
