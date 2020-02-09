<?php

namespace App\DataTables;

use App\Models\DataSet;
use App\Models\Donor;
use Yajra\Datatables\Services\DataTable;

class DataSetDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('description', function (DataSet $dataSet) {
                return str_limit($dataSet->description, 30, '...');
            }, false)
            ->editColumn('donor_id', function (DataSet $dataSet) {
                return !empty($dataSet->Donor()) ? $dataSet->Donor()->name : '';
            })
            ->filterColumn('donor_id', function ($query, $keyword) {
                $ids = [];
                foreach (Donor::where('name', 'like', '%'.$keyword.'%')->get(['id']) as $donor)
                {
                    $ids[] = $donor->id;
                }
                if ( !empty($ids) )
                {
                    $query->whereRaw('`donor_id` = ?', $ids);
                }
                else
                {
                    $query->whereRaw('`donor_id` = ?', [0]);
                }
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $select = DataSet::select();

        return $this->applyScopes($select);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->parameters([
                "lengthMenu"   => [ 10, 25, 50, 75, 100 ],
                "pageLength"   => 50,
                'dom'          => 'Bfrtip',
                'buttons'      => ['csv', 'excel', 'print', 'reset', 'reload'],
                "order" => [[ 3, "desc" ]],
                'initComplete' => "function () {
                            this.api().columns().every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                $(input).appendTo($(column.footer()).empty())
                                .on('change', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                            });
                        }",
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
            'id',
            'exported',
            'donor_id',
            'updated_at',
            'created_at',

            'manufacturer',
            'product_name',
            'sku',
            'stockin',
            'price_rub',
            'price_usd',
            'description',
            'main_image',
            'gallery',
            'product_attributes',
            'hash',
            'source',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'datasetdatatables_' . time();
    }
}
