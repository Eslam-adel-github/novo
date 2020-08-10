<script type="text/javascript">
    function select_all() {
        $('input[class=selected_data]:checkbox').each(function(){
            if($('input[class=select-all]:checkbox:checked').length == 0){
                $(this).prop("checked", false);
            } else {
                $(this).prop("checked", true);
            }
        });
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.multiDeleteBtn', function(event) {
        if ($(".selected_data").filter(":checked").length == 0) {
            swal.fire("{{ __("main.nothing_selected") }}", "{{ __('main.select_records_to_delete') }}", "error");
        } else {
            let length = $(".selected_data").filter(":checked").length;
            let msg = "{{ trans('main.ask-delete') }}" + " " + length + " " + "{{ trans('main.record') }} !";

            swal.fire({
                title: '{{ trans('main.ask') }}',
               text: msg,
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{ __('main.yes') }}',
                cancelButtonText: '{{ __('main.close') }}',
            }).then(function(result) {
                if (result.value) {
                    var $ids_to_delete = [];

                    $('.selected_data').filter(":checked").each(function(index) {
                        $ids_to_delete[index] = $(this).val();
                    });

                    $.ajax({
                        url: '{{ request()->url() }}/null',
                        method: 'POST',
                        data: {
                            ids: $ids_to_delete,
                            _method: 'DELETE',
                        },
                        success (response) {
                            swal.fire(
                                '{{ __('main.deleted-message') }}',
                                length + ' {{ __('main.records_deleted_successfully') }}',
                                'success'
                            )
                            $('table').DataTable().draw(false);
                            $('input[class=select-all]:checkbox:checked').prop("checked", false);
                        },
                        error (xhr) {
                            swal.fire(
                                '{{ __('main.faild_delete') }}',
                                '{{ __('main.faild_to_delete_records') }}',
                                'error'
                            )
                        },
                    });
                }
            });
        }
    });

</script>
