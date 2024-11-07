<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class LearningVideo
 * @package App\Models
 * @version June 5, 2024, 3:32 pm UTC
 *
 * @property string $title
 * @property string $thumbnail
 * @property string $video_link
 */
class LearningVideo extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'learning_videos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'video_key',
        'thumbnail',
        'embed_url',
        'video_link'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'video_key' => 'string',
        'thumbnail' => 'string',
        'embed_url' => 'string',
        'video_link' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:255',
        'video_key' => 'required|string',
        'thumbnail' => 'required|string',
        'video_link' => 'required|string',
        'embed_url' => 'required|string',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
