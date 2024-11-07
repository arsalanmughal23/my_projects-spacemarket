<?php

namespace App\Repositories;

use App\Models\Testimonial;
use App\Repositories\BaseRepository;

/**
 * Class TestimonialRepository
 * @package App\Repositories
 * @version June 5, 2024, 3:20 pm UTC
*/

class TestimonialRepository extends BaseRepository
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
        return Testimonial::class;
    }
}
