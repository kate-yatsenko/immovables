$(document).ready(function () {


    var role = $('#example1').data('role');
    var content = $('#example1').data('content');
    if(role == content){
        $('#example1_filter').css('display', 'none');
    }


    $('#example1').on('click', '.delete-construction', function () {
        var selected = $(this);
        var sure = confirm("Вы уверены?");
        if (sure) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                url: selected.data('path'),
                success: function () {
                    selected.parent().parent().remove();
                }
            });
        }
    });

    $('select[name="city"]').on('change', function () {
        var cityId = $(this).val();
        if (cityId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'dist/get/' + cityId,
                type: "GET",
                dataType: "json",
                beforeSend: function () {
                    $('#loader').css("visibility", "visible");
                },
                success: function (data) {
                    $('select[name="district"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="district"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                },
                complete: function () {
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="district"]').empty();
        }

    });

    var options = [];
    $('select[name="properties"]').on('change', function () {
        var optionSelect = $('option:selected', this).val();
        options.push(optionSelect);
        var nameOfOptionSelect = $('option:selected', this).data('name');
        $(this).parent().parent().find('.inputs').append(`<div class="input"><p>` + nameOfOptionSelect + ` <button data-value="${nameOfOptionSelect}" data-id="${optionSelect}" type="button" class="align-items-end fa fa-remove delete-prop-constr" data-path=""></button></p><input class="form-control" name="property[${optionSelect}]"></div>`);
        $('option:selected', this).each(function () {
            $(this).remove();
        });
    });

    $('.content').on('click', '.delete-prop-constr', function () {
        var sure = confirm("Вы уверены?");
        if (sure) {
            var selected = $(this);
            selected.parent().parent().remove();
            var id = selected.data('id');
            var value = selected.data('value');
            $('select[name="properties"]').append(`<option id="opt${id}" value="${id}"
        data-name="${value}">` + value + `</option>`);
        }
    });

    $('.content').on('click', '.delete-prop-constr-in-edit', function () {
        var selected = $(this);
        var prop_id = $(this).data('prop_id');
        var prop_constr_id = $(this).data('prop_constr_id');
        var value = $(this).data('value');
        var sure = confirm("Вы уверены?");
        if (sure) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'propertyconstruction/' + prop_constr_id,
                type: "DELETE",
                success: function () {
                    selected.parent().parent().remove();
                    $('select[name="properties"]').append(`<option id="opt${prop_id}" value="${prop_id}"
        data-name="${value}">` + value + `</option>`);
                }
            });
        }
    });


    $('.content').on('click', '.load-ajax-modal', function () {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            url: $(this).data('path'),
            success: function (result) {
                $('#modal-default').find('.modal-body').html(result);
            }
        });
    });

    $(".content").on("change", ".files", function () {
        $(this).css("display", "none");
        $(this).parent().append('<input class="files" type="file" multiple name="files[]">');
    });

    $('.content').on('click', '.remove-img', function () {
        var selected = $(this);
        var id = selected.data('id');
        var sure = confirm("Вы уверены?");
        if (sure) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'images/' + id,
                type: "DELETE",
                success: function () {
                    selected.parent().remove();
                }
            });
        }
    });
});