<?php


namespace App\DataTables;
use App\CategoryFaq;
use App\CategoryLibrary;
use App\Faq;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class FaqDataTables extends DataTable
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
            ->editColumn('question', function (Faq $model) {
                return VarByLang(getData(collect($model),"question"));
            })
            ->editColumn('checkbox', $this->getColumnCheckboxHtml())
            ->editColumn('created_at',function ($model){
                return date("Y-m-d H:i:s",strtotime($model->created_at));
            })
            ->editColumn('actions',function($model){
                $view    = sprintf('<a href="%s" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="%s"><i class="la la-eye"></i></a>',route(config('system.admin.name').'faq.show',[$model->id]), __('main.show'));
                $edit    = sprintf('<a href="%s" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="%s"><i class="la la-edit"></i></a>',route(config('system.admin.name').'faq.edit',[$model->id]), __('main.edit'));
                $delete  = sprintf('<a data-id="'.$model->id.'" id="FaqDelete_'.$model->id.'" class="faqDelete btn btn-sm btn-clean btn-icon btn-icon-md"  title="%s"><i class="la la-trash"></i></a>',__('main.delete'));
                $delete.=sprintf('
                        <script defer>
                            $("#FaqDelete_%s").on("click",(e)=>{
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
                    __('main.ask-delete').VarByLang(getData(collect($model),"question")),
                    __('main.yes'),
                    __('main.no'),
                    route(config('system.admin.name').'faq.destroy',[$model->id]),
                    __('main.success'),
                    __('main.deleted-message'),
                    route('admin.faq.index'),
                    route('admin.faq.index'),
                    __('main.canceled'),
                    __('main.no_data_deleted')

                );
                return $view . ' ' . $edit .' '.$delete;
            })
            ->rawColumns(['checkbox', 'question','actions']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Faq $model)
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
            ->setTableId('faq-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->buttons($this->getButtons())
            ->parameters($this->getCustomBuilderParameters([1, 2, 3], [], GetLanguage() == 'ar'));
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
            Column::make('question', 'question')->title(trans('main.question')),
            Column::make('created_at', 'created_at')->title(trans('main.created_at')),
            Column::make('actions', 'actions')->title(trans('main.actions'))->searchable(false)->orderable(false)->printable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'faqtables_' . date('YmdHis');
    }

}
