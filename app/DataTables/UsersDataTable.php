<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Helpers\Classes\UserType;

class UsersDataTable extends DataTable

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
            ->editColumn('checkbox', $this->getColumnCheckboxHtml())
            ->editColumn('created_at',function ($model){
                return date("Y-m-d",strtotime($model->created_at));
            })
            ->editColumn('type',function ($model){
                if($model->type==0){
                    return "Admin";
                }
                elseif ($model->type==1){
                    return "Registered";
                }

                return "HCP";
            })
            ->editColumn('specialties_name',function ($model){
                return $model->specialties_name ?VarByLang($model->specialties_name,'en'):"N/A";
            })
            ->filterColumn('specialties_name',function ($query,$keyword){
                return $query->where('specialties.name','Like',"%".$keyword."%");
            })
            ->filterColumn('type',function ($query,$keyword){
                $user_type=0;
                $search=false;
                if(strtolower($keyword)== strtolower("Admin")){
                    $user_type=0;
                    $search=true;
                }
                elseif(strtolower($keyword)== strtolower("Registered")){
                    $user_type=1;
                    $search=true;
                }
                elseif(strtolower($keyword)==strtolower("HCP")){
                    $user_type=2;
                    $search=true;
                }
                elseif($keyword==0){
                    $search=true;
                    $user_type=$keyword;
                }
                elseif($keyword==1){
                    $search=true;
                    $user_type=$keyword;
                }
                elseif($keyword==2){
                    $search=true;
                    $user_type=$keyword;
                }
                return $query->where('users.type',$user_type);
                /*
                return $query->when($search,function($query) use ($user_type){
                    return $query->where('users.type',$user_type);
                });
                */
            })
            ->editColumn('actions',function($model){
                $view    = sprintf('<a href="%s" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="%s"><i class="la la-eye"></i></a>',route(config('system.admin.name').'users.show',[$model->id]), __('main.show'));
                $edit    = sprintf('<a href="%s" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="%s"><i class="la la-edit"></i></a>',route(config('system.admin.name').'users.edit',[$model->id]), __('main.edit'));
                $delete  = sprintf('<a data-id="'.$model->id.'" id="userDelete_'.$model->id.'" class="userDelete btn btn-sm btn-clean btn-icon btn-icon-md"  title="%s"><i class="la la-trash"></i></a>',__('main.delete'));
                $delete.=sprintf('
                        <script defer>
                            $("#userDelete_%s").on("click",(e)=>{
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
                        __('main.ask-delete') . $model->name,
                        __('main.yes'),
                        __('main.no'),
                        route(config('system.admin.name').'users.destroy',[$model->id]),
                        __('main.success'),
                        __('main.deleted-message'),
                        route('admin.users.index'),
                        route('admin.users.index'),
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
    public function query(User $model)
    {
        return $model->leftJoin('specialties', 'users.specialty_id', '=', 'specialties.id')->select('users.*','specialties.name as specialties_name')->orderBy("users.id","desc")->newQuery();
        //with('specaility')->orderBy("id","desc")->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->buttons($this->getButtons())
                    ->parameters($this->getCustomBuilderParameters([1, 2,3,4,5], [
                        [
                            'index_num' => 5,
                            'selectValues' => getUsersType()
                        ],
                    ], GetLanguage() == 'ar'));
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
            Column::make('email', 'email')->title(trans('main.email')),
            Column::make('phone', 'phone')->title(trans('main.phone')),//specaility
            Column::make('specialties_name', 'specialties_name')->title(trans('main.specialty')),
            Column::make('type', 'type')->title(trans('main.type'))->width(70),
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
        return 'Users_' . date('YmdHis');
    }
}
