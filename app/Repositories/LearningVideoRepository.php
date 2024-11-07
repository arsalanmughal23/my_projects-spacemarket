<?php

namespace App\Repositories;

use App\Models\LearningVideo;
use App\Repositories\BaseRepository;

/**
 * Class LearningVideoRepository
 * @package App\Repositories
 * @version June 5, 2024, 3:32 pm UTC
*/

class LearningVideoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'thumbnail',
        'video_link'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LearningVideo::class;
    }
}
