<?php

namespace App\DataTables;

use App\Models\Childcategory;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\EloquentDataTable;


class ChildcategoryDataTable extends DataTable
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
        $columns = array_column($this->getColumns(), 'data');
        $dataTable = 
        $dataTable
          
            ->editColumn('updated_at', function ($subcategory) {
                return getDateColumn($subcategory, 'updated_at');
            })
           
            ->rawColumns(array_merge($columns, ['action']));

        return $dataTable;
    }

    public function query(Childcategory $model)
    {
        return $model->newQuery()->where('subcategory_id',request()->id );
    }
   
 
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax();
            
    }

    protected function getColumns()
    {
        $columns = [
          
            [
                'data' => 'name',
                'title' => 'name',

            ],
            [
                'data' => 'description',
                'title' => 'description',
            ],
            [
                'data' => 'updated_at',
                'title' => 'Created at',
            ]
        ];
        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Childcategory_' . date('YmdHis');
    }
}
