<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Blog
 * @package App\Models
 * @version June 5, 2024, 5:33 pm UTC
 *
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $banner_image
 */
class Blog extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'blogs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const CONST_TODAY_BLOG = 'today_blog';
    const CONST_ALL_BLOG = 'all_blog';
    const CONST_RELATED_BLOG = 'related_blog';



    protected $dates = ['deleted_at'];
    protected $appends = ['short_description', 'banner_image_link', 'image_link'];



    public $fillable = [
        'title',
        'description',
        'banner_image',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'banner_image' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:5000',
        'image' => 'required|file|mimetypes:image/jpeg,image/jpg,image/png',
        'banner_image' => 'required|file|mimetypes:image/jpeg,image/jpg,image/png',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
    
    public static $update_rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:5000',
        'image' => 'file|mimetypes:image/jpeg,image/jpg,image/png',
        'banner_image' => 'file|mimetypes:image/jpeg,image/jpg,image/png',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function getShortDescriptionAttribute()
    {
        $maxLength = 250;
        // Check if the description length is greater than the maximum length
        if (strlen($this->description) > $maxLength) {
            // Truncate the description and add ellipsis
            $shortDescription = substr($this->description, 0, $maxLength) . '...';
        } else {
            // If the description is already short enough, return it as is
            $shortDescription = $this->description;
        }

        return $shortDescription;
    }


    public function getImageLinkAttribute() 
    {
        return $this->image ? asset('public/storage/'.$this->image) : null;
        // return config('filesystems.disks.public.url').'/'.$this->link;
    }
    public function getBannerImageLinkAttribute() 
    {
        return $this->banner_image ? asset('public/storage/'.$this->banner_image) : null;
        // return config('filesystems.disks.public.url').'/'.$this->link;
    }
}
