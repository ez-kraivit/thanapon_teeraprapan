@extends('layouts.app')
@section('title','รายการย้อนหลัง')
@section('content')
<div class="card shadow mb-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ตาราง บันทึกย้อนหลัง</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">วันเดือนปี</th>
                                    <th scope="col" class="text-center">รห้สบิล</th>
                                    <th scope="col" class="text-center">ดูตัวอย่าง</th>
                                    <th scope="col" class="text-center">ยอดรวมสุทธิ</th>
                                    <th scope="col" class="text-center">ส่วนลด</th>
                                    <th scope="col" class="text-center">มูลค่าสินค้าหลังหักส่วนลด</th>
                                    <th scope="col" class="text-center">ภาษีมูลค่าเพิ่ม 7%</th>
                                    <th scope="col" class="text-center">ค่าจัดส่ง</th>
                                    <th scope="col" class="text-center">รวมเงิน</th>
                                    <th scope="col" class="text-center">สถานะ</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bill as $item)
                                <tr>
                                    <th class="text-center">{{$item->updated_at->format('d/m/Y')}}</th>
                                    <th class="text-center">{{$item->number_bill}}</th>
                                    <th class="text-center">
                                        <form action="{{route('show.csv',$item->number_bill)}}" method="get"
                                            target="_blank">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </form>
                                    </th>
                                    <th class="text-center">{{$item->net_total}}</th>
                                    <th class="text-center">{{$item->discount}}</th>
                                    <th class="text-center">{{$item->products_value_discount}}</th>
                                    <th class="text-center">{{$item->vat}}</th>
                                    <th class="text-center">{{$item->shipping_cost}}</th>
                                    <th class="text-center">{{$item->total}}</th>
                                    <th class="text-nowrap">
                                        @if($item->status=='on')
                                        <div class="col-12 text-center">
                                            <h6>
                                                <span class="badge badge-success">พร้อมใช้งาน</span>
                                            </h6>
                                        </div>
                                        @else
                                        <div class="col-12 text-center">
                                            <h6>
                                                <span class="badge badge-danger">ปิดปรับปรุง</span>
                                            </h6>
                                        </div>
                                        @endif
                                    </th>
                                    <th class="text-nowrap">
                                        <div class="row ">

                                            <div class="col-6 text-right">
                                                <a href="#"
                                                    onclick="window.open('{{route('show.csv',$item->number_bill)}}','POPUP WINDOW TITLE HERE','width=650,height=800').print()"
                                                    type="button" class="btn btn-warning"><i
                                                        class="fas fa-file-download"></i></a>
                                            </div>
                                            <div class="col-6 text-lift">
                                                <a type="submit" class="btn btn-danger text-white" id="del{{$item->id}}"
                                                    data-toggle="modal" data-target="#DeleteModal-{{$item->id}}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>

                                        </div>
                                    </th>

                                    {{-- Modal Delete --}}
                                    <div class="modal fade" id="DeleteModal-{{$item->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        ท่านต้องการลบข้อมูลหรือไม่ ?</h5>
                                                    <a class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="modal-body">
                                                    การลบข้อมูลนั้นมีความสัมพันธ์กับข้อมูลชุดอื่น หากลบข้ามความสัมพันธ์
                                                    ระบบจะแสดงแจ้งเตือน ป้องกันการลบข้อมูลที่มีผลต่อผู้ใช้งาน
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">ยกเลิก</button>
                                                    <form action="{{route('delete.csv',$item->id)}}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Modal Delete --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
@endif
@endsection
