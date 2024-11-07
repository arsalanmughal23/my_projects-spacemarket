<?php

namespace App\DataTables;

use App\Models\LearningVideo;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class LearningVideoDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        $dataTable->editColumn('thumbnail', function($model){
            return '<a href="'.$model->thumbnail.'" target="_blank">Thumbnail</a>';
        });
        $dataTable->editColumn('embed_url', function($model){
            return '<a href="'.$model->embed_url.'" target="_blank">Embed Url</a>';
        });
        $dataTable->editColumn('video_link', function($model){
            return '<a href="'.$model->video_link.'" target="_blank">Video Link</a>';
        });

        return $dataTable->addColumn('action', 'learning_videos.datatables_actions')
            ->rawColumns(['thumbnail','embed_url','video_link','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\LearningVideo $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(LearningVideo $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    // ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'title',
            'video_key',
            'thumbnail',
            'embed_url',
            'video_link'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'learning_videos_datatable_' . time();
    }
}
