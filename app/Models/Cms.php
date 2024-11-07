<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Cms
 * @package App\Models
 * @version May 24, 2024, 9:56 am UTC
 *
 * @property string $page_slug
 * @property string $section_slug
 * @property string $key
 * @property string $value
 */
class Cms extends Model
{
    use HasFactory;

    public $table = 'cms';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    const CONST_MARKETPLACE_SLUGS = ['forex','indices','shares','commodities_energies'];
    const CONST_TRADING_SLUGS = ['account_types', 'payment_methods', 'withdrawals', 'deposits'];
    const CONST_PARTNER_SLUGS = ['affiliate', 'white_label'];
    const CONST_SUPPORT_SLUGS = ['get_help', 'faq', 'about_us', 'legal_documents', 'subscribe_newsletter', 'contact_us'];
    const CONST_LAYOUT_PART_SLUGS = ['header','pre_footer','footer'];
    // const CONST_SETTING_SLUGS = ['header','pre_footer','footer'];



    public $fillable = [
        'page_slug',
        'section_slug',
        'key',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'page_slug' => 'string',
        'section_slug' => 'string',
        'key' => 'string',
        'value' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'page_slug' => 'required|string|max:255',
        'section_slug' => 'required|string|max:255',
        'key' => 'required|string|max:255',
        'value' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
