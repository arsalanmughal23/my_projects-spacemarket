<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AccountType
 * @package App\Models
 * @version June 5, 2024, 2:46 pm UTC
 *
 * @property string $account_name
 * @property string $minimum
 * @property string $spread
 * @property string $commission
 * @property string $bonus
 * @property string $platform
 * @property string $leverage
 */
class AccountType extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'account_types';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'account_name',
        'minimum',
        'spread',
        'commission',
        'bonus',
        'platform',
        'leverage'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'account_name' => 'string',
        'minimum' => 'string',
        'spread' => 'string',
        'commission' => 'string',
        'bonus' => 'string',
        'platform' => 'string',
        'leverage' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'account_name' => 'required|string|max:255',
        'minimum' => 'required|string|max:255',
        'spread' => 'required|string|max:255',
        'commission' => 'required|string|max:255',
        'bonus' => 'required|string|max:255',
        'platform' => 'required|string|max:255',
        'leverage' => 'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
