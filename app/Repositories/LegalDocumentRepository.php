<?php

namespace App\Repositories;

use App\Models\LegalDocument;
use App\Repositories\BaseRepository;

/**
 * Class LegalDocumentRepository
 * @package App\Repositories
 * @version June 5, 2024, 3:52 pm UTC
*/

class LegalDocumentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'link'
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
        return LegalDocument::class;
    }
}
