<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'sucategory_name',

    ];
    // public function categorisx()
    // {
    //     return $this->belongsTo(category::class, 'category_id', 'id');
    // }
}
