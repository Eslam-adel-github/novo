function select_all() {
    $('input.selected_data:checkbox').each(function(){
        if($('input.select-all:checkbox:checked').length == 0){
            $(this).prop("checked", false);
        } else {
            $(this).prop("checked", true);
        }
    });
}
function deleteUser(e){
    e.preventDefault()
    swal.fire({
        title: 'data',
        text: "{{ __('main.delete-check-record') }}",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'a',
        cancelButtonText: 'N',
        reverseButtons: true
    }).then(function(result){
        if (result.value) {
        } else if (result.dismiss === 'cancel') {
            swal.fire("{{ __('main.canceled') }}", "{{ __('main.delete-canceled') }}", "error");
        }
    });

    console.log('hello')
}