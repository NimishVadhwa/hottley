var image_path = 'http://localhost/hottely/public/';


function openFile(event) {
    // var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];

    var input = event.target;

    if (input.files.length) {

        var result = check_image_ext(input.files[0].name);

        if (result == false) {
            iziToast.warning({
                message: "Only Accept Images",
                position: "topCenter"
            });

            $(input).val('');

            $('#image1').attr('src', `${ image_path }image/no-image.jpg `);

            // return;
            event.preventDefault();
        } else {

            // if ((input.files[0].size / 1024 / 1024) >= 1) {
            //     iziToast.warning({
            //         message: "Please upload the image not be greater than 1 mb",
            //         position: "topCenter"
            //     });


            //     $(event).val('');

            //     $('#image1').attr('src', `${ window.location.origin }/public/image / no - image.jpg `);


            //     return;
            // }


            var reader = new FileReader();

            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('image1');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);

        }


    } else {
        $(input).val('');

        $('#image1').attr('src', `${ image_path }image/no-image.jpg `);

    }

    // console.log( $('#image').val() );

};

function openFile2(event) {

    var input = event.target;

    if (input.files.length) {

        var result = check_image_ext(input.files[0].name);

        if (result == false) {
            iziToast.warning({
                message: "Only Accept Images",
                position: "topCenter"
            });

            $(input).val('');

            $('#image3').attr('src', `${ image_path }image/no-image.jpg `);

            event.preventDefault();
        } else {

            var reader = new FileReader();

            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('image3');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);

        }


    } else {
        $(input).val('');

        $('#image3').attr('src', `${ image_path }image/no-image.jpg `);

    }

    // console.log( $('#image').val() );

};

function check_image_ext(src) {
    var extension = src.substr(src.lastIndexOf(".") + 1);

    var fileExtension = ['jpeg', 'jpg', 'png', 'gif'];
    var ext = fileExtension.includes(extension);

    return ext;


}

function add_property() {


    if ($('#name').val().trim() == '') {

        iziToast.warning({
            message: "Please fill property name",
            position: "topCenter"
        });
    } else if ($('#location').val().trim() == '') {

        iziToast.warning({
            message: "Please fill property location",
            position: "topCenter"
        });
    } else if ($('#address').val().trim() == '') {

        iziToast.warning({
            message: "Please fill property address",
            position: "topCenter"
        });
    } else if ($('#number').val().trim() == '') {

        iziToast.warning({
            message: "Please fill property care taker number",
            position: "topCenter"
        });
    } else if ($('#image').val() == '') {
        iziToast.warning({
            message: "Please select property image",
            position: "topCenter"
        });
    } else {
        $('#add_property').submit();
    }

}

function open_property(data) {
    // console.log(data);

    $('#edit_property').find('#p_id').val(data.id);
    $('#edit_property').find('#edit_name').val(data.name);
    $('#edit_property').find('#edit_location').val(data.location);
    $('#edit_property').find('#edit_address').val(data.address);
    $('#edit_property').find('#edit_number').val(data.number);
    $('#edit_property').find('#image3').attr('src', data.image);
}

function edit_property() {
    if ($('#edit_name').val().trim() == '') {

        iziToast.warning({
            message: "Please fill property name",
            position: "topCenter"
        });
    } else if ($('#edit_location').val().trim() == '') {

        iziToast.warning({
            message: "Please fill property location",
            position: "topCenter"
        });
    } else if ($('#edit_address').val().trim() == '') {

        iziToast.warning({
            message: "Please fill property address",
            position: "topCenter"
        });
    } else if ($('#edit_number').val().trim() == '') {

        iziToast.warning({
            message: "Please fill property care taker number",
            position: "topCenter"
        });
    } else {
        $('#edit_property').submit();
    }
}

function add_voucher() {

    if ($('#property_id').val() == 0) {
        iziToast.warning({
            message: "Please select property",
            position: "topCenter"
        });
    } else if ($('#name').val().trim() == '') {
        iziToast.warning({
            message: "Please fill guest name",
            position: "topCenter"
        });
    } else if ($('#number').val().trim() == '') {
        iziToast.warning({
            message: "Please fill contact number",
            position: "topCenter"
        });
    } else if ($('#check_in').val().trim() == '') {
        iziToast.warning({
            message: "Please fill check In date",
            position: "topCenter"
        });
    } else if ($('#check_out').val().trim() == '') {
        iziToast.warning({
            message: "Please fill check out date",
            position: "topCenter"
        });
    } else if (!($('#check_out').val().trim() > $('#check_in').val().trim())) {
        iziToast.warning({
            message: "Check out date is not correct",
            position: "topCenter"
        });
    } else if ($('#adult').val().trim() == '' && $('#kid').val().trim() == '' && $('#infant').val().trim() == '') {
        iziToast.warning({
            message: "Please fill guest numbers",
            position: "topCenter"
        });
    } else if ($('#total').val().trim() == '') {
        iziToast.warning({
            message: "Please fill total amount",
            position: "topCenter"
        });
    } else if ($('#advance').val().trim() == '') {
        iziToast.warning({
            message: "Please fill advance amount",
            position: "topCenter"
        });
    }
    //else if ($('#due').val().trim() == '') {
    //     iziToast.warning({
    //         message: "Please fill due amount",
    //         position: "topCenter"
    //     });
    // }
    //  else if (parseInt($('#total').val()) != parseInt($('#advance').val()) + parseInt($('#due').val())) {
    //     iziToast.warning({
    //         message: "Please check the amount",
    //         position: "topCenter"
    //     });
    // } 
    else {
        $('#add_voucher').submit();
    }

}

function open_edit_voucher(data) {

    $('#edit_data_voucher').find('#v_id').val(data.id);
    $('#edit_data_voucher').find('#edit_property').val(data.property_id);
    $('#edit_data_voucher').find('#edit_name').val(data.name);
    $('#edit_data_voucher').find('#edit_number').val(data.phone_number);
    $('#edit_data_voucher').find('#edit_check_in').val(data.check_in.replace(' ', 'T'));
    $('#edit_data_voucher').find('#edit_check_out').val(data.check_out.replace(' ', 'T'));
    $('#edit_data_voucher').find('#edit_adult').val(data.adult);
    $('#edit_data_voucher').find('#edit_kid').val(data.kids);
    $('#edit_data_voucher').find('#edit_infant').val(data.infants);
    $('#edit_data_voucher').find('#edit_total').val(data.total_amount);
    $('#edit_data_voucher').find('#edit_receive').val(data.advance);
    $('#edit_data_voucher').find('#edit_due').val(data.due);

}

function edit_voucher() {

    if ($('#edit_property').val() == 0) {
        iziToast.warning({
            message: "Please select property",
            position: "topCenter"
        });
    } else if ($('#edit_name').val().trim() == '') {
        iziToast.warning({
            message: "Please fill guest name",
            position: "topCenter"
        });
    } else if ($('#edit_number').val().trim() == '') {
        iziToast.warning({
            message: "Please fill contact number",
            position: "topCenter"
        });
    } else if ($('#edit_check_in').val().trim() == '') {
        iziToast.warning({
            message: "Please fill check In date",
            position: "topCenter"
        });
    } else if ($('#edit_check_in').val().trim() == '') {
        iziToast.warning({
            message: "Please fill check out date",
            position: "topCenter"
        });
    } else if (!($('#edit_check_out').val().trim() > $('#edit_check_in').val().trim())) {
        iziToast.warning({
            message: "Check out date is not correct",
            position: "topCenter"
        });
    } else if ($('#edit_adult').val().trim() == '' && $('#edit_kid').val().trim() == '' && $('#edit_infant').val().trim() == '') {
        iziToast.warning({
            message: "Please fill guest numbers",
            position: "topCenter"
        });
    } else if ($('#edit_total').val().trim() == '') {
        iziToast.warning({
            message: "Please fill total amount",
            position: "topCenter"
        });
    } else if ($('#edit_receive').val().trim() == '') {
        iziToast.warning({
            message: "Please fill advance amount",
            position: "topCenter"
        });
    }
    // else if ($('#edit_due').val().trim() == '') {
    //     iziToast.warning({
    //         message: "Please fill due amount",
    //         position: "topCenter"
    //     });
    // } else if (parseInt($('#edit_total').val()) != parseInt($('#edit_receive').val()) + parseInt($('#edit_due').val())) {
    //     iziToast.warning({
    //         message: "Please check the amount",
    //         position: "topCenter"
    //     });
    // } 
    else {
        $('#edit_data_voucher').submit();
        // console.log('submit');
    }

}