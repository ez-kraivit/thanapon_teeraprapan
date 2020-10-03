<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>all</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="https://www.codebee.co.th/invoicemaker/" />
    <meta http-equiv="content-language" content="th" />

    <link rel=' stylesheet' type='text/css' href='https://www.codebee.co.th/invoicemaker/css/bootstrap.min.css' />
    <link rel='stylesheet' type='text/css' href='{{asset('css/style_print.css')}}' />
    <script type='text/javascript' src='https://www.codebee.co.th/invoicemaker/js/jquery-1.3.2.min.js'></script>
    <script type='text/javascript' src='https://www.codebee.co.th/invoicemaker/js/invoicemaker.js'></script>

</head>

<body>
    @foreach ($bills as $bill)
    <div id="page-wrap">
        <div id="header_print">ต้นฉบับใบกำกับอย่างย่อ/ใบเสร็จรับเงิน</div>
        <div id=" customer">
            <div class="col h-100">
                <table id="meta2">
                    <tr>
                        <td colspan="2" style="text-align: left">
                            <div id="address">
                                <b>
                                    ลูกค้า : {{$bill->detail}}
                                </b>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col h-100">
                <table id="meta">
                    <tr>
                        <td colspan="2" style="text-align: left">
                            <div>บริษัท เฟิร์ส คลาส มาร์เก็ตติ้ง จำกัด</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: left">
                            <div>88/17 ม.7 ต.สวนพริกไทย อ.เมือง จ.ปทุมธานี 12000</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" class="meta-head">เลขประจำตัวผู้เสียภาษี</td>
                        <td style="text-align: center">
                            <div>0135562017643</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" class="meta-head">เลขบิลที่ออก</td>
                        <td style="text-align: center">
                            <div>{{$bill->number_bill}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" class="meta-head">วันที่ออก</td>
                        <td style="text-align: center">
                            <div id="date">{{$bill->updated_at->format('d/m/Y')}}</div>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        <br>
        <table id="items">
            <tr>
                <th colspan="2" style="text-align: center">สินค้า</th>
                <th style="text-align: center">จำนวน</th>
                <th style="text-align: center">หน่วย</th>
                <th style="text-align: center">ราคาต่อหน่วย</th>
                <th style="text-align: center">จำนวนเงิน</th>
            </tr>
            {{-- วนลูปรายการ --}}
            @if ($bill->cevita!="0")
            <tr class="item-row">
                <td colspan="2" class="item-name" style="text-align: center">
                    <div class="delete-wpr">
                        <div>Cevita</div>
                    </div>
                </td>
                <td style="text-align: center"><span class="number">{{$bill->cevita}}</span></td>
                <td style="text-align: center"><span class="unit">กล่อง</span></td>
                <td style="text-align: center"><span class="unit_price">690</span></td>
                <td style="text-align: center"><span class="price">690</span></td>
            </tr>
            @endif
            @if ($bill->celery!="0")
            <tr class="item-row">
                <td colspan="2" class="item-name">
                    <div class="delete-wpr" style="text-align: center">
                        <div>Cevita Celery </div>
                    </div>
                </td>
                <td style="text-align: center"><span class="number">{{$bill->celery}}</span></td>
                <td style="text-align: center"><span class="unit">กล่อง</span></td>
                <td style="text-align: center"><span class="unit_price">390</span></td>
                <td style="text-align: center"><span class="price">390</span></td>
            </tr>
            @endif
            @if ($bill->orinca_coffee!="0")
            <tr class="item-row">
                <td colspan="2" class="item-name">
                    <div class="delete-wpr" style="text-align: center">
                        <div>Orinca Coffee</div>
                    </div>
                </td>
                <td style="text-align: center"><span class="number">{{$bill->orinca_coffee}}</span></td>
                <td style="text-align: center"><span class="unit">กล่อง</span></td>
                <td style="text-align: center"><span class="unit_price">290</span></td>
                <td style="text-align: center"><span class="price">290</span></td>
            </tr>
            @endif
            <tr class="item-row">
                <td colspan="2" class="item-name" style="text-align: center">
                    <div class="delete-wpr">
                        <div>ค่าจัดส่ง</div>
                    </div>
                </td>
                <td style="text-align: center"><span class="number">-</span></td>
                <td style="text-align: center"><span class="unit">-</span></td>
                <td style="text-align: center"><span class="unit_price">50</span></td>
                <td style="text-align: center"><span class="price">50</span></td>
            </tr>
            {{-- จบลูปรายการ --}}
            <tr>
                <td colspan="4" class="blank"> </td>
                <td colspan="1" class="total-line" style="text-align: center;font-weight: bold;">ยอดรวมสุทธิ</td>
                <td colspan="1" style="text-align: center">{{$bill->net_total}} บาท</td>
            </tr>
            <tr>
                <td colspan="4" class="blank"> </td>
                <td colspan="1" class="total-line" style="text-align: center;font-weight: bold;">ส่วนลด</td>
                <td colspan="1" style="text-align: center">{{$bill->discount}} บาท</td>

            </tr>
            <tr>
                <td colspan="4" class="blank"> </td>
                <td colspan="1" class="total-line" style="text-align: center;font-weight: bold;">
                    มูลค่าสินค้าหลังหักส่วนลด</td>

                <td colspan="1" style="text-align: center">{{$bill->products_value_discount}} บาท</td>
            </tr>
            <tr>
                <td colspan="4" class="blank"> </td>
                <td colspan="1" class="total-line" style="text-align: center;font-weight: bold;">ภาษีมูลค่าเพิ่ม 7%
                </td>
                <td colspan="1" style="text-align: center">{{$bill->vat}} บาท</td>
            </tr>

            <tr>
                <td colspan="4" class="blank"> </td>
                <td colspan="1" class="total-line " style="text-align: center;font-weight: bold;">รวมเงิน</td>
                <td colspan="1" style="text-align: center">{{$bill->total}} บาท</td>
            </tr>
        </table>
        <div id="bidder">
            <h5></h5>
            <h5>ลงชื่อ.............................................ผู้รับเงิน</h5>
        </div>
    </div>
    @endforeach
</body>
<script>
    $(function () {
        window.print();
    });

</script>

</html>
