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

    protected $casts = [
        'can_view'     => 'boolean',
        'can_create'   => 'boolean',
        'can_edit'     => 'boolean',
        'can_delete'   => 'boolean',
        'can_toggle'   => 'boolean',
        'can_download' => 'boolean',
        'can_upload'   => 'boolean',
    ];

    // protected static function newFactory(): GroupFactory
    // {
    //     // return GroupFactory::new();
    // }
}
