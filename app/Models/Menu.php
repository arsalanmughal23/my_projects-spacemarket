<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Menu
 * @package App\Models
 * @version January 16, 2023, 2:52 pm UTC
 *
 * @property string $name
 * @property string $icon
 * @property string $slug
 * @property integer $position
 * @property integer $status
 */
class Menu extends Model
{

    use HasFactory;

    public $table = 'menus';




    public $fillable = [
        'name',
        'icon',
        'slug',
        'position',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'icon' => 'string',
        'slug' => 'string',
        'position' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'icon' => 'required',
        'slug' => 'required'
    ];


}
