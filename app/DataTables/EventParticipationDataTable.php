<?php

namespace App\DataTables;

use App\User;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Helpers\Classes\UserType;

class EventParticipationDataTable extends DataTable

{
    use BuilderParameters;
    public $data_model;

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
            ->editColumn('specaility',function ($model){
                return $model->specaility?VarByLang(getData(collect($model->specaility),"name")):"N/A";
            })
            ->filterColumn('specaility',function ($query,$keyword){
                 return $query->whereHas('specaility',function ($query_inside) use($keyword){
                    return $query_inside->where("name",'like',"%".$keyword."%");
                });
            })
            ->editColumn('type',function ($model){
                if(isset($model->userEventsRegister) && count($model->userEventsRegister)>0){
                    return $model->userEventsRegister[0]?$model->userEventsRegister[0]->type:"";
                }
                else{
                    return $model->userEventsInvite[0]?$model->userEventsInvite[0]->type:"";
                }

            })
            ->filterColumn('type',function ($query,$keyword){
                if(Route::currentRouteName()=='admin.show_invite_to_event'){
                    return $query->whereHas('userEventsInvite',function ($query_inside) use($keyword){
                        return $query_inside->where("type",'like',"%".$keyword."%");
                    });
                }
                return $query->whereHas('userEventsRegister',function ($query_inside) use($keyword){
                    return $query_inside->where("type",'like',"%".$keyword."%");
                });

            })
            ->editColumn('status',function ($model){
                if(isset($model->userEventsRegister) && count($model->userEventsRegister)>0){
                    return $model->userEventsRegister[0]?$model->userEventsRegister[0]->status:"";
                }
                else{
                    return $model->userEventsInvite[0]?$model->userEventsInvite[0]->status:"";
                }

            })
            ->filterColumn('status',function ($query,$keyword){
                if(Route::currentRouteName()=='admin.show_invite_to_event'){
                    return $query->whereHas('userEventsInvite',function ($query_inside) use($keyword){
                        return $query_inside->where("status",'like',"%".$keyword."%");
                    });
                }
                return $query->whereHas('userEventsRegister',function ($query_inside) use($keyword){
                    return $query_inside->where("status",'like',"%".$keyword."%");
                });

            })
            ->editColumn('event_date',function ($model){
                if(isset($model->userEventsRegister) && count($model->userEventsRegister)>0){
                    return $model->userEventsRegister[0]?$model->userEventsRegister[0]->event->event_date:"";
                }
                else{
                    return $model->userEventsInvite[0]?$model->userEventsInvite[0]->event->event_date:"";
                }

            })
            ->filterColumn('event_date',function ($query,$keyword){
                if(Route::currentRouteName()=='admin.show_invite_to_event'){
                    return $query->whereHas('userEventsInvite.event',function ($query_inside) use($keyword){
                        return $query_inside->where("event_date",'like',"%".$keyword."%");
                    });
                }
                return $query->whereHas('userEventsRegister.event',function ($query_inside) use($keyword){
                    return $query_inside->where("event_date",'like',"%".$keyword."%");
                });

            })
            ->editColumn('actions',function($model){
                if(isset($model->userEventsRegister) && count($model->userEventsRegister)>0){
                    $userEventStatus= $model->userEventsRegister[0]->id;
                }
                else{
                    $userEventStatus=$model->userEventsInvite[0]->id;
                }
                $view    = sprintf('<a href="%s" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="%s"><i class="la la-eye"></i></a>',route(config('system.admin.name').'users.show',[$model->id]), __('main.show'));
                $change_status  = sprintf('<a data-id="'.$userEventStatus.'" id="changeUserEventStatus_'.$userEventStatus.'" class="changeUserEventStatus btn btn-sm btn-clean btn-icon btn-icon-md"  title="%s"><i class="la la-trash"></i></a>',__('main.change_user_event_status'));
                $change_status.=sprintf('
                        <script defer>
                            $("#changeUserEventStatus_%s").on("click",(e)=>{
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
                                        axios.post("%s").then((res) => {
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
                        $userEventStatus,
                        __('main.ask-change_event_sataus'),
                        __('main.ask-change_event_sataus'),
                        __('main.yes'),
                        __('main.no'),
                        route(config('system.admin.name').'change.user.event.satatus',[$userEventStatus]),
                        __('main.success'),
                        __('main.status_successfull_change'),
                        url()->current(),
                        url()->current(),
                        __('main.canceled'),
                        __('main.no_action_taked')

                    );
                return $view . ' '  .' '.$change_status;
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
        return $this->data_model->newQuery();
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
                    ->parameters($this->getCustomBuilderParameters([1, 2,3,4,6], [
                        [
                            'index_num' => 6,
                            'selectValues' => getInviteStatus()
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
            Column::make('phone', 'phone')->title(trans('main.phone')),
            Column::make('specaility', 'specaility')->title(trans('main.specialty'))->orderable(false),
            Column::make('type', 'type')->title(trans('main.type'))->orderable(false),
            Column::make('status', 'status')->title(trans('main.status'))->width(100)->orderable(false),
            Column::make('event_date', 'event_date')->title(trans('main.event_date'))->orderable(false),
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
