@extends('layouts.app')
@section('title','หน้าแรก')
@section('content')


<div class="row-full h-100 py-2" style="font-family:'Prompt', sans-serif;font-size:14px">
    <div class="row">
        <div class="col-md-12 py-2">
            <div class="card shadow mb-12">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">โปรแกรม คำนวณ อัตโนมัติและออกแบบใบเสร็จ</h6>
                </div>
                <div class="card-body">
                    <p>
                        สำหรับผู้ใช้รายใหม่ ท่านทำการนำข้อมูล รายชื่อที่เป็น platform ที่ทางเราแนะนำ จะประกอบด้วย
                        วันเดือนปี,ข้อมูล เช่น (ชื่อนามสกุล ที่อยู่ เบอร์โทรศัพท์), ผลิตภัณฑ์ 1, ผลิตภัณฑ์ 2, ผลิตภัณฑ์
                        3, ยอดรวม บันทึกชนิดไฟล์เป็น CSV utf-8 นำมาอัพโหลดบนระบบ
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center mb-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">ตรวจสอบข้อมูล ผ่านไฟล์ CSV utf-8</h6>
            </div>
            <div class="card-body">
                <form id="upload_csv" autocomplete="off" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">ข้อมูล CSV :</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('csv_file') is-invalid @enderror"
                                        name="csv_file" id="imgInp"
                                        accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                        required>
                                    <input type="text" class="custom-file-input" name="_token" value="{{csrf_token()}}">
                                    <label class="custom-file-label" for="exampleInputFile" id="InputFileName">Choose
                                        file</label>
                                </div>
                            </div>
                            @error('csv_file')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="reset" id="reset" class="btn btn-secondary">
                            ยกเลิก
                        </button>
                        <button type="submit" class="btn btn-primary">
                            ตรวจสอบข้อมูล
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="csv_file_data"></div>
<form id='success_csv' action='{{route('check.csv')}}' autocomplete='off' method='POST'>
    @csrf
    <input type="hidden" id='csv_detail' name='csv_detail'>
</form>
<script>
    $(document).ready(function () {
        $('#reset').click(function () {
            $('#InputFileName').text("Choose file");
            $('#show-image').show()
        });
        $('#imgInp').on('change', prepareUpload);

        function prepareUpload(event) {
            files = event.target.files[0];
            $('#InputFileName').text(files.name);
            $('#show-image').show()
        };
    });
    $(function () {
        $('#upload_csv').on('submit', function (event) {
            var url = "{{route('import.csv')}}";
            event.preventDefault();
            $.ajax({
                url: url,
                method: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    var objectrow;
                    var arrayobject = [];
                    var html = '<div class="row justify-content-center">';
                    html += '<div class="col-md-12">';
                    html += '<div class="card">';
                    html += '<div class="card-body">';
                    html += '<div  class="table-responsive">';
                    html += '<table class="table  table-hover">';
                    if (data['column']) {
                        html += '<thead>';
                        html += '<tr>';
                        for (var count = 0; count < data['column'].length; count++) {
                            html += '<td><b>' + data['column'][count] + '</b></td>';
                        }
                        html += '</tr>';
                        html += '</thead>';
                    }
                    if (data['row_data']) {
                        for (var count = 0; count < data.row_data.length; count++) {
                            shipping_cost = 50;
                            Cevitas = data.row_data[count].data_prod1 * 690;
                            Celerys = data.row_data[count].data_prod2 * 390;
                            Orincas = data.row_data[count].data_prod3 * 290;
                            Picetotal = (Cevitas + Celerys + Orincas) + shipping_cost;
                            total = data.row_data[count].data_total;
                            Discount = Picetotal - total;
                            Tax = data.row_data[count].data_total * 7 / 107;
                            Valueafterdeduction = total - Tax;
                            html += '<tr>';
                            html += '<td class="name" contenteditable>' + data.row_data[
                                    count]
                                .data_date + '</td>';
                            html += '<td class="name" contenteditable>' + data.row_data[
                                    count]
                                .data_detail + '</td>';
                            html += '<td class="v1" contenteditable>' + data.row_data[count]
                                .data_prod1 + '</td>';
                            html += '<td class="v2" contenteditable>' + data.row_data[count]
                                .data_prod2 + '</td>';
                            html += '<td class="v3" contenteditable>' + data.row_data[count]
                                .data_prod3 + '</td>';
                            html += '<td class="v4" contenteditable>' + data.row_data[count]
                                .data_total + '</td>';
                            html += '<td class="Piceall" contenteditable>' + Picetotal
                                .toFixed(
                                    2) + '</td>';
                            html += '<td class="Discount" contenteditable>' + Discount
                                .toFixed(
                                    2) + '</td>';
                            html += '<td class="Tax" contenteditable>' + Tax.toFixed(2) +
                                '</td>';
                            html += '<td class="Valueafterdeduction" contenteditable>' +
                                Valueafterdeduction.toFixed(2) + '</td>';
                            '</tr>';
                            html += '<td class="shipping_cost" contenteditable>' +
                                shipping_cost.toFixed(2) + '</td>';
                            '</tr>';

                            objectrow = {
                                "updated_at": data.row_data[count].data_date,
                                "detail": data.row_data[count].data_detail,
                                "cevita": data.row_data[count].data_prod1,
                                "celery": data.row_data[count].data_prod2,
                                "orinca_coffee": data.row_data[count].data_prod3,
                                "total": parseInt(total).toFixed(2),
                                "net_total": Picetotal.toFixed(2),
                                "discount": Discount.toFixed(2),
                                "vat": Tax.toFixed(2),
                                "products_value_discount": Valueafterdeduction.toFixed(
                                    2),
                                "shipping_cost": shipping_cost.toFixed(
                                    2),
                            }
                            // console.log(objectrow)
                            arrayobject.push(objectrow)
                        }
                    }
                    html += '<table>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';

                    html +=
                        '<div align="right"><button type="submit" id="submit_check" class="btn btn-success">ยืนยัน</button></div>';
                    $('#csv_file_data').html(html);
                    $('#csv_detail').val(JSON.stringify(arrayobject));

                    $('#submit_check').click(function () {
                        $('#success_csv').submit();
                    });
                }

            })
        });
    });

</script>
@if(Session::has('SuccessInsertCsv'))
<script>
    Swal.fire({
        title: 'แจ้งเตือน',
        text: 'ระบบทำการเพิ่มข้อมูล CSV เรียบร้อยแล้ว',
        icon: 'success',
        showConfirmButton: false,
        timer: 3500
    });

</script>
@endif
@endsection
