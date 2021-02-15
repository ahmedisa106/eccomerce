$(document).on('click', '#check_all', function () {


    $('input[class="item_checkbox"]:checkbox').each(function () {

        if ($('input[id="check_all"]:checkbox:checked').length === 0) {
            $(this).prop('checked', false)
        } else {
            $(this).prop('checked', true);
        }


    })
})


function deleteAll() {
    $(document).on('click', '.del_all', function () {

        $('#form_data').submit();
    });


    $(document).on('click', '.DelBtn', function () {

        var item_checked = $('input[class="item_checkbox"]:checkbox').filter(":checked").length;


        if (item_checked > 0) {

            $('.item_count').text(item_checked);
            $('.not_empty_record').removeClass('hidden');
            $('.empty_record').addClass('hidden');

        } else {
            $('.not_empty_record').addClass('hidden');
            $('.empty_record').removeClass('hidden');
        }
        $('#MultipleDelete').modal().show();

    })
}







