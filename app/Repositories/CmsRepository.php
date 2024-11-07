<?php

namespace App\Repositories;

use App\Models\Cms;
use App\Repositories\BaseRepository;

/**
 * Class CmsRepository
 * @package App\Repositories
 * @version May 24, 2024, 9:56 am UTC
*/

class CmsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'page_slug',
        'section_slug',
        'key',
        'value'
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
        return Cms::class;
    }
}
