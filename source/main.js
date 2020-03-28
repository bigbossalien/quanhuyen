$(document).ready(function () {
    for (let key in provincial) {
        $('select[name=tinh]').append("<option value='" + provincial[key].code + "'>" + provincial[key].name + "</option>")
    }
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    $('div.tinh_thanh').on('change', 'select[name=tinh]', function () {
        var code = $(this).val();
        var html = "<option value=''>-- Chọn quận huyện --</option>";
        for (let d in district) {
            if (district[d].parent_code === code) {
                html += "<option value='" + district[d].code + "'>" + district[d].name + "</option>";
            }
        }
        $('select[name=quan_huyen]').html(html);
    });
    $('div.quan_huyen').on('change', 'select[name=quan_huyen]', function () {
        var code = $(this).val();
        var html = "<option value=''>-- Chọn tỉnh thành --</option>";
        for (let q in town) {
            if (town[q].parent_code === code) {
                html += "<option value='" + town[q].code + "'>" + town[q].name + "</option>";
            }
        }
        $('select[name=phuong_xa]').html(html);
    });

    $('form#frmCustomer').validate({
        rules: {
            name: 'required',
            phone: {
                required: true
            },
            tinh: {
                required: true
            },
            quan_huyen: {
                required: true
            },
            phuong_xa: {
                required: true
            },
            address: 'required'
        },
        messages: {
            name: "Vui lòng nhập tên của bạn",
            phone: {
                required: "Vui lòng nhập số điện thoại"
            },
            tinh: {
                required: "Vui lòng chọn tỉnh thành"
            },
            quan_huyen: {
                required: "Vui lòng chọn quận huyện"
            },
            phuong_xa: {
                required: "Vui lòng chọn phường xã"
            },
            address: "Vui lòng nhập địa chỉ"
        },
        submitHandler: function (form,e) {
            e.preventDefault();
            $.ajax({
                url:'../action.php',
                type:'POST',
                data: {
                    name: $('input[name=name]').val(),
                    phone: $('input[name=phone]').val(),
                    tinh: $('select[name=tinh]').find('option:selected').text(),
                    quan_huyen: $('select[name=quan_huyen]').find('option:selected').text(),
                    phuong_xa: $('select[name=phuong_xa]').find('option:selected').text(),
                    address: $('input[name=address]').val()
                },
                success:function (res) {
                    var res = JSON.parse(res);
                    Toast.fire({
                        icon: res.status,
                        title: res.message
                    })

                }
            })
        }
    })


});