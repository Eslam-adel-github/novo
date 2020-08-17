<input type="hidden" name="table-data" value="{{ $data }}">
<input type="hidden" name="table-image" value="{{asset('uploads/###')}}">

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
                    {
    					field: 'name',
    					title: '{{ __('main.name') }}',
                        template: function(row) {
                            return Helpers.VarByLang(row.name, document.querySelector("html").lang);
                        },
    				},
                    {
                        field: 'website',
                        title: '{{ __('main.website') }}',
                        template:function(row){
                            return '<a target="_blank" href="'+row.website+'">website</a>'
                        }
                    },
                    {
                        field: 'image',
                        title: '{{ __('main.name') }}',
                        template: function(row) {
                            return '<a target="_blank" href="'+$("input[name=table-image]").val().replace('###',row.image)+'">image</a>'
                        },
                    },
                    {
                        field: 'visible',
                        title: '{{ __('main.visible') }}'
                    },
                    {
                        field: 'mobile',
                        title: '{{ __('main.mobile') }}'
                    },
                    {
                        field: 'email',
                        title: '{{ __('main.email') }}'
                    },
                    {
                        field: 'address',
                        title: '{{ __('main.address') }}'
                    },
                    {
                        field: 'name',
                        title: '{{ __('main.name') }}',
                        template: function(row) {
                            return Helpers.VarByLang(row.name, document.querySelector("html").lang);
                        },
                    },
                    {
    					field: 'created_at',
    					title: '{{ __('main.created_at') }}',
    					type: 'date',
    					format: 'YYYY/MM/DD',
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
                            window.location = '{{ route('admin.service_centers.index') }}';
                        }, 1000)
                    }
                }).catch(() => {
                    window.location = '{{ route('admin.service_centers.index') }}';
                });
            } else if (result.dismiss === 'cancel') {
                swal.fire("{{ __('main.canceled') }}", "{{ __('main.no_data_deleted') }}", "error");
            }
        });
    });
</script>
