<input type="hidden" name="table-data" value="{{ $data }}">

<script type="text/javascript">
    'use strict';
    // Class definition

    var KTDatatableDataLocalDemo = function() {
    	// Private functions

    	// demo initializer
    	var demo = function() {
    		var datatable = $('.kt-datatable').KTDatatable({
    			// datasource definition
    			data: {
    				type: 'local',
    				source: JSON.parse($('input[name=table-data]').val()),
    				pageSize: 10,
    			},

    			// layout definition
    			layout: {
    				scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
    				// height: 450, // datatable's body's fixed height
    				footer: false, // display/hide footer
    			},

    			// column sorting
    			sortable: true,

    			pagination: true,

    			// columns definition
    			columns: [
    				// {
    				// 	field: 'id',
    				// 	title: '{{ __('main.user_id') }}',
    				// 	sortable: false,
    				// 	width: 20,
    				// 	type: 'number',
    				// 	selector: {class: 'kt-checkbox--solid'},
    				// 	textAlign: 'center',
    				// },
                    {
    					field: 'name',
    					title: '{{ __('main.name') }}',
    				},
                    {
                        field: 'email',
                        title: '{{ __('main.email') }}',
                    },
                    {
    					field: 'phone',
    					title: '{{ __('main.phone') }}',
    				},
                    {
    					field: 'created_at',
    					title: '{{ __('main.created_at') }}',
    					type: 'date',
    					format: 'YYYY/MM/DD',
    				},
                    {
    					field: 'roles',
    					title: '{{ __('main.roles') }}',
    					// callback function support for column rendering
    					template: function(row) {
                            var classes = {
                                0: ' kt-badge--primary',
                                1: ' kt-badge--info',
                                2: ' kt-badge--warning'
                            }
							console.log(row)
    						var type = {
                                @foreach (user_types() as $key => $type)
                                    {{ $type }}: {'title': '{{ __("main.$type") }}', 'class': classes[{{ $key }}]},
                                @endforeach
    						};
    						return '<span class="kt-badge ' + type[row.type].class + ' kt-badge--inline kt-badge--pill">' + type[row.type].title + '</span>';
    					},
    				},
                    {
    					field: 'Actions',
    					title: 'Actions',
    					sortable: false,
    					width: 110,
    					overflow: 'visible',
    					autoHide: false,
    					template: function(row) {
    						return '\
                            <a href="' + row.show_url + '" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{ __('main.show') }}">\
    							<i class="la la-eye"></i>\
    						</a>\
    						<a href="' + row.edit_url + '" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{ __('main.edit') }}">\
    							<i class="la la-edit"></i>\
    						</a>\
    						<a href="' + row.show_url + '" class="btn btn-sm btn-clean btn-icon btn-icon-md deleteBtn" title="{{ __('main.delete') }}">\
    							<i class="la la-trash"></i>\
    						</a>\
    					';
    					},
    				}],
    		});
    	};

    	return {
    		// Public functions
    		init: function() {
    			// init dmeo
    			demo();
    		},
    	};
    }();

    jQuery(document).ready(function() {
    	KTDatatableDataLocalDemo.init();
    });

    $(document).on('click', '.deleteBtn', (e) => {
        e.preventDefault();
        console.log('asdadasd')
        var url = $(e.currentTarget).attr("href");
        swal.fire({
            title: '{{ __('main.ask-delete') }}',
            text: "{{ __('main.ask-delete') }}",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: '{{ __('main.yes') }}',
            cancelButtonText: '{{ __('main.no') }}',
            reverseButtons: true
        }).then(function(result){
            if (result.value) {
                axios.post(url, {_method: 'DELETE'}).then((res) => {
                    if (res.data.success) {
                        swal.fire("{{ __('main.success') }}", "{{ __('main.deleted-message') }}", "success");
                        setTimeout(() => {
                            window.location = '{{ route('admin.users.index') }}';
                        }, 1000)
                    }
                }).catch(() => {
                    window.location = '{{ route('admin.users.index') }}';
                });
            } else if (result.dismiss === 'cancel') {
                swal.fire("{{ __('main.canceled') }}", "{{ __('main.no_data_deleted') }}", "error");
            }
        });
    });
</script>
