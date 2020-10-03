@extends('layouts.app')
@section('title','รายการย้อนหลัง รายเดือน')
@section('content')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<div class="card shadow mb-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ตาราง บันทึกย้อนหลัง รายเดือน</div>
                <div class="card-body">
                    <form action="{{route('check.csv.month')}}" method="get" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Start Date:</label>
                            <div class="input-group">
                                <input id="datepicker1" name="startdate" class="form-control"
                                    value="{{Carbon\Carbon::now()->format('m/d/Y')}}" required />
                                <script>
                                    $('#datepicker1').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });

                                </script>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>End Date:</label>
                            <div class="input-group">
                                <input id="datepicker2" name="enddate" class="form-control" required />
                                <script>
                                    $('#datepicker2').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });

                                </script>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">ค้นหา</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@if(Session::has('SuccessDeleteCsv'))
<script>
    Swal.fire({
        title: 'แจ้งเตือน',
        text: 'ระบบทำการลบข้อมูล CSV เรียบร้อยแล้ว',
        icon: 'success',
        showConfirmButton: false,
        timer: 3500
    });

</script>
@elseif(Session::has('NotData'))
<script>
    Swal.fire({
        title: 'แจ้งเตือน',
        text: 'ระบบทำการค้นหาไม่พบข้อมูล วันที่ค้นหา',
        icon: 'error',
        showConfirmButton: false,
        timer: 3500
    });

</script>
@endif
@endsection
