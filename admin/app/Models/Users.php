<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class Users
 * @package App\Models
 * @version January 10, 2023, 8:51 am UTC
 *
 * @property string $name
 * @property string $email
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 */
class Users extends Model
{
    // use SoftDeletes;
    use HasRoles;
    use HasFactory;

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */

    public static function rules() {
        return  [
            'name' => 'required|string|max:'.config('constants.validation.users.name.size_max'),
            'email' => 'required|string|max:'.config('constants.validation.users.email.size_max'),
            'email_verified_at' => 'nullable',
            'password' => 'required|confirmed|min:'.config('constants.validation.users.password.size_min'),
            'remember_token' => 'nullable|string|max:'.config('constants.validation.users.remember_token.size_max'),
            'created_at' => 'nullable',
            'updated_at' => 'nullable'
        ];
    }

    public static function update_rules() {
        return  [
            'name' => 'required|string|max:'.config('constants.validation.users.name.size_max'),
            'email' => 'string|max:'.config('constants.validation.users.email.size_max'),
            'email_verified_at' => 'nullable',
            'password' => 'nullable|confirmed|min:'.config('constants.validation.users.password.size_min'),
            'remember_token' => 'nullable|string|max:'.config('constants.validation.users.remember_token.size_max'),
            'created_at' => 'nullable',
            'updated_at' => 'nullable'
        ];
    }

    // public static $rules = [
    //     'name' => 'required|string|max:255',
    //     'email' => 'required|string|max:255',
    //     'email_verified_at' => 'nullable',
    //     'password' => 'required|confirmed|min:6',
    //     'remember_token' => 'nullable|string|max:100',
    //     'created_at' => 'nullable',
    //     'updated_at' => 'nullable'
    // ];


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    // public function user_details()
    // {
    //     return $this->hasOne(UserDetail::class, "user_id", 'id');
    // }
}
