<?php

namespace App\DataTables;

use App\Models\UserRequest;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UserRequestDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */

    public $type;
    public $status;

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        $dataTable->editColumn('department_id', function($model){
            return $model->department?->name ?? '-';
        });

        $dataTable->editColumn('status', function($model){
            return $model->status_text;
        });

        $dataTable->editColumn('created_at', function($model){
            return Carbon::parse($model->created_at)->format('d/M/Y');
        });
        $dataTable->editColumn('updated_at', function($model){
            return Carbon::parse($model->updated_at)->format('d/M/Y');
        });

        return $dataTable->addColumn('action', 'user_requests.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UserRequest $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UserRequest $model)
    {        
        $model = $model->newQuery();
        if ($this->type)
            $model->where('type', $this->type);

        if ($this->status)
            $model->where('status', $this->status);            

        return $model;
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
        $columns = [
            // 'type' =>  ['title' => 'Type', 'searchable' => false],
            'full_name' =>  ['title' => 'Full Name', 'searchable' => false],
            'email' =>  ['title' => 'Email', 'searchable' => false],
            'contact_number' =>  ['title' => 'Contact Number', 'searchable' => false],
            // 'ticket_number' =>  ['title' => 'Ticket Number', 'searchable' => false],
            // 'trade_number' =>  ['title' => 'Trade Number', 'searchable' => false],
            'description' =>  ['title' => 'Description', 'searchable' => false],
            // 'status' =>  ['title' => 'Status', 'searchable' => false],
            'created_at' =>  ['title' => 'Created At', 'searchable' => false],
            // 'updated_at' =>  ['title' => 'Updated At', 'searchable' => false],
        ];

        if($this->type == 'contact_us')
            $columns = array_merge(['department_id' => ['title' => 'Department', 'searchable' => false]], $columns);

        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'user_requests_datatable_' . time();
    }
}
