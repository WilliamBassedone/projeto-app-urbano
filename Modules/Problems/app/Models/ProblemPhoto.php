<?php

namespace Modules\Problems\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Problems\Database\Factories\ProblemPhotoFactory;

class ProblemPhoto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'problems_photos';

    protected $fillable = [
        'id_problem',
        'archive',
    ];

    // protected static function newFactory(): ProblemPhotoFactory
    // {
    //     // return ProblemPhotoFactory::new();
    // }
}
