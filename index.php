<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          crossorigin="anonymous">
    <style type="text/css">
        label.error{
            color: red;
            margin: 0;
            font-size: 13px;
            font-style: italic;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="get" accept="" action="" class="frm" id="frmCustomer">
                <div class="form-group">
                    <label>Họ tên:</label>
                    <input type="text" name="name" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label>Di động:</label>
                    <input type="tel" name="phone" class="form-control" value="">
                </div>
                <div class="form-group tinh_thanh">
                    <label>Tỉnh / Tp:</label>
                    <select name="tinh" class="form-control">
                        <option value="">-Chọn tỉnh thành-</option>
                    </select>
                </div>

                <div class="form-group quan_huyen">
                    <label>Quận/Huyện:</label>
                    <select name="quan_huyen" class="form-control">
                        <option value="">-Chọn quận huyện-</option>
                    </select>
                </div>

                <div class="form-group phuong_xa">
                    <label>Phường/Xã:</label>
                    <select name="phuong_xa" class="form-control">
                        <option value="">-Chọn phường xã-</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Số nhà :</label>
                    <input type="text" name="address" class="form-control" value="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn_send_data">Gửi Ngay</button>
                </div>

                <div class="frm-loading"></div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="source/provincial.js"></script>
<script src="source/district.js"></script>
<script src="source/town.js"></script>
<script src="source/main.js"></script>


</body>
</html>