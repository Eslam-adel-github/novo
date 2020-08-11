<?php


namespace App\DataTables;


use App\HCP;
use App\Pharmacy;
use App\RethinkObesity;
use App\TempleteEvent;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TempleteEventDataTables extends DataTable
{
    use BuilderParameters;

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('name', function (TempleteEvent $model) {
                return $model->templete_name;
            })
            ->editColumn('checkbox', $this->getColumnCheckboxHtml())
            ->editColumn('created_at',function ($model){
                return date("Y-m-d",strtotime($model->created_at));
            })
            ->editColumn('actions',function($model){
                $view    = sprintf('<a href="%s" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="%s"><i class="la la-eye"></i></a>',route(config('system.admin.name').'templete_event.show',[$model->id]), __('main.show'));
                $edit    = sprintf('<a href="%s" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="%s"><i class="la la-edit"></i></a>',route(config('system.admin.name').'templete_event.edit',[$model->id]), __('main.edit'));
                $delete  = sprintf('<a data-id="'.$model->id.'" id="TempleteDelete_'.$model->id.'" class="templeteDelete btn btn-sm btn-clean btn-icon btn-icon-md"  title="%s"><i class="la la-trash"></i></a>',__('main.delete'));
                $delete.=sprintf('
                        <script defer>
                            $("#TempleteDelete_%s").on("click",(e)=>{
                                swal.fire({
                                    title: "%s",
                                    text: "%s",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonText: "%s",
                                    cancelButtonText: "%s",
                                    reverseButtons: true
                                }).then(function(result){
                                    if (result.value) {
                                        axios.post("%s", {_method: "DELETE"}).then((res) => {
                                            if (res.data.success) {
                                                swal.fire("%s", "%s", "success");
                                                setTimeout(() => {
                                                    window.location = "%s";
                                                }, 1000)
                                            }
                                        }).catch(() => {
                                            window.location = "%s";
                                        });
                                    } else if (result.dismiss === "cancel") {
                                        swal.fire("%s", "%s", "error");
                                    }
                                });
                            })
                        </script>',
                    $model->id,
                    __('main.ask-delete'),
                    __('main.ask-delete') . $model->templete_name,
                    __('main.yes'),
                    __('main.no'),
                    route(config('system.admin.name').'templete_event.destroy',[$model->id]),
                    __('main.success'),
                    __('main.deleted-message'),
                    route('admin.templete_event.index'),
                    route('admin.templete_event.index'),
                    __('main.canceled'),
                    __('main.no_data_deleted')

                );
                return $view . ' ' . $edit .' '.$delete;
            })
            ->rawColumns(['checkbox', 'type','actions']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TempleteEvent $model)
    {
        return $model->orderBy("id","desc")->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('templete_event-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->buttons($this->getButtons())
            ->parameters($this->getCustomBuilderParameters([1, 2,3], [], GetLanguage() == 'ar'));
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('checkbox', $this->getTitleCheckboxHtml())->width(15)->printable(false),
            Column::make('name', 'name')->title(trans('main.name')),
            Column::make('created_at', 'created_at')->title(trans('main.created_at')),
            Column::make('actions', 'actions')->title(trans('main.actions'))->searchable(false)->orderable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'templete_event_' . date('YmdHis');
    }
}
