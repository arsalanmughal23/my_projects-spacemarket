<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DataList
 * @package App\Models
 * @version June 5, 2024, 2:28 pm UTC
 *
 * @property string $type
 * @property string $detail
 */
class DataList extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'data_lists';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const TYPE_MARKETPLACE_FOREX = 'marketplace__forex';
    const TYPE_MARKETPLACE_INDICES = 'marketplace__indices';
    const TYPE_MARKETPLACE_SHARES = 'marketplace__shares';
    const TYPE_MARKETPLACE_COMMODITIES_ENERGIES = 'marketplace__commodities_energies';
    const TYPE_PARTNER_AFFILIATES = 'partner__affiliate';
    const TYPE_SUPPORT_ABOUT_SECTION5 = 'support_about_us__section5';
    const CONST_TYPES = [self::TYPE_MARKETPLACE_FOREX, self::TYPE_MARKETPLACE_INDICES, self::TYPE_MARKETPLACE_SHARES, self::TYPE_MARKETPLACE_COMMODITIES_ENERGIES, self::TYPE_PARTNER_AFFILIATES, self::TYPE_SUPPORT_ABOUT_SECTION5];

    protected $dates = ['deleted_at'];



    public $fillable = [
        'type',
        'detail'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string',
        'detail' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'required|string|max:255',
        'detail' => 'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
