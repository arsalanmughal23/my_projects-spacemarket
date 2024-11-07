<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Permissions
 * @package App\Models
 * @version January 10, 2023, 9:09 am UTC
 *
 * @property \App\Models\ModelHasPermission $modelHasPermission
 * @property \Illuminate\Database\Eloquent\Collection $roles
 * @property string $name
 * @property string $guard_name
 */
class Permissions extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'permissions';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    const ROUTES = ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'];

    public $fillable = [
        'name',
        'guard_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'guard_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules()
    {
        return [
            'name' => 'required|string|max:'.config('constants.validation.permissions.name.size_max'),
            // 'guard_name' => 'required|string|max:255',
            'created_at' => 'nullable',
            'updated_at' => 'nullable'
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function modelHasPermission()
    {
        return $this->hasOne(\App\Models\ModelHasPermission::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class, 'role_has_permissions');
    }

    /**
     * Generate Route Permissions Lists
     *
     * @param  mixed $table_name
     * @return void
     */
    public function generatePermissions($table_name)
    {
        $routes = array();
        foreach (self::ROUTES as $key => $route) {
            $routes[]['name'] = $table_name . "." . $route;
        }
        return $routes;
    }
}
