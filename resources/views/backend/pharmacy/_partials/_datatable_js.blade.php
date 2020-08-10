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
                    {
    					field: 'name',
    					title: '{{ __('main.name') }}',
                        template: function(row) {
                            return Helpers.VarByLang(row.name, document.querySelector("html").lang);
                        },
    				},
                    {
    					field: 'product_make',
    					title: '{{ __('main.product_make') }}',
                        template: function(row) {
                            return row.product_make.name;
						},
					},
					{
    					field: 'product_model',
    					title: '{{ __('main.product_model') }}',
                        template: function(row) {
                            return row.product_model.name;
						},
					},
					{
    					field: 'facebook_url',
						title: '{{ __('main.facebook') }}',
						template:function(row){
							return '<a href='+row.facebook_url+'>Facebook</a>'
						}
					},
					{
    					field: 'visible',
    					title: '{{ __('main.visible') }}',
                        template: function(row) {
                            return row.visible==1?"visible":"hidden";
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
                            window.location = '{{ route('admin.owner_clubs.index') }}';
                        }, 1000)
                    }
                }).catch(() => {
                    window.location = '{{ route('admin.owner_clubs.index') }}';
                });
            } else if (result.dismiss === 'cancel') {
                swal.fire("{{ __('main.canceled') }}", "{{ __('main.no_data_deleted') }}", "error");
            }
        });
    });
</script>
