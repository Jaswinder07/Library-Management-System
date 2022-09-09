// const { type, data } = require("jquery");

$(document).ready(function() {

    /**
     * Search By Filter Book Not Return Table
     */

    $("#search-not-return-book").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#search-not-return-table tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });


    /**
     * Search By Filter Book Due Today Table
     */
    $("#search-book-due-today-filter").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#search-book-due-today-table tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });


    /**
     * Search By Filter Book Returned Today Table
     */
    $("#search-book-return-today-filter").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#search-book-return-today-table tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });






    /**
     * Preloader
     */
    $('#preloader').fadeOut(1500);


    /**
     * Focus on Form
     */
    $('.text-form-control').each(function() {
        $(this).on('blur', function() {
            if ($(this).val().trim() != "") {
                $(this).addClass('has-val');
            } else {
                $(this).removeClass('has-val');
            }
        })
    })


    /**
     * Session alert auto hide
     */
    // $('#session_alert').fadeOut(10000);


    /**
     * Show Tool-tip
     */
    // $('[data-toggle="tooltip"]').tooltip();


    /**
     * Delete-Confirm
     */
    $('.delete-confirm').on('click', function(event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure! want to delete?',
            text: 'This record and it`s details will be permanently deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });


    /**
     * Checkbox Delete
     */
    $('#master').on('click', function(e) {
        if ($(this).is(':checked', true)) {
            $(".sub_chk").prop('checked', true);
        } else {
            $(".sub_chk").prop('checked', false);
        }
    });


    /**
     * Delete Record With Checkboxes
     */
    $('.delete_all').on('click', function(e) {
        var allVals = [];
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });

        if (allVals.length <= 0) {
            swal("Please select a row", "that you want to delete", "error")
        } else {

            var check = confirm("Are you sure you want to delete this row?");
            if (check == true) {

                var join_selected_values = allVals.join(",");

                $.ajax({
                    url: $(this).data('url'),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: 'ids=' + join_selected_values,
                    success: function(data) {
                        if (data['success']) {
                            $(".sub_chk:checked").each(function() {
                                $(this).parents("tr").remove();
                            });

                            swal("Success", "Record has been removed", "success")
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('');
                            swal("Oops", "Something went wrong!!", "error")
                        }
                    },
                    error: function(data) {
                        alert(data.responseText);
                    }
                });

                $.each(allVals, function(index, value) {
                    $('table tr').filter("[data-row-id='" + value + "']").remove();
                });
            }
        }
    });


    /**
     *  Librarian Setting
     */
    $('#admin_registration_form').hide();
    $('#admin_registration_button').click(function() {
        $('#admin_list').hide();
        $('#admin_registration_form').slideToggle('slow');
    });
    $('#admin_list_button').click(function() {
        $('#admin_registration_form').hide();
        $('#admin_list').slideToggle('slow');
    });
    // Librarian Setting End


    /**
     *  Add To Notes
     */
    $('#alert-success').hide();
    $('#alert-fail').hide();

    $('#add-notes').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/home',
            data: $('#add-notes').serialize(),
            success: function(response) {
                console.log(response)
                $("#add-notes")[0].reset();
                $('#alert-fail').hide();
                $('#alert-success').fadeIn(1000);
            },
            error: function(error) {
                console.log(error)
                $('#alert-success').hide();
                $('#alert-fail').fadeIn(500);
            }
        });
    });


});