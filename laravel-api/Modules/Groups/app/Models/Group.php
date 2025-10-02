<?php

namespace Modules\Groups\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Groups\Database\Factories\GroupFactory;

class Group extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'can_view',
        'can_create',
        'can_edit',
        'can_delete',
        'can_toggle',
        'can_download',
        'can_upload'
    ];

    // protected static function newFactory(): GroupFactory
    // {
    //     // return GroupFactory::new();
    // }
}
