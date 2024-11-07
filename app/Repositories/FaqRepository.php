<?php

namespace App\Repositories;

use App\Models\Faq;
use App\Repositories\BaseRepository;

/**
 * Class FaqRepository
 * @package App\Repositories
 * @version June 6, 2024, 9:47 pm UTC
*/

class FaqRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description'
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
        return Faq::class;
    }
}
