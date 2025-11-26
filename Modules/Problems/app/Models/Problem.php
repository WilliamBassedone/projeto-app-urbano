<?php

namespace Modules\Problems\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Problems\Database\Factories\ProblemFactory;

class Problem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'description',
        'id_categorie',
        'geolocation',
        'ip',
        'status',
    ];

    public function photos()
    {
        return $this->hasMany(ProblemPhoto::class, 'id_problem');
    }

    // protected static function newFactory(): ProblemFactory
    // {
    //     // return ProblemFactory::new();
    // }
}
