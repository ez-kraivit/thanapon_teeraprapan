<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <base href="https://www.codebee.co.th/invoicemaker/" />
    <meta http-equiv="content-language" content="th" />

    <link rel='stylesheet' type='text/css' href='https://www.codebee.co.th/invoicemaker/css/bootstrap.min.css' />
    <link rel='stylesheet' type='text/css' href='{{asset('css/style_print.css')}}' />
    <script type='text/javascript' src='https://www.codebee.co.th/invoicemaker/js/jquery-1.3.2.min.js'></script>
    <script type='text/javascript' src='https://www.codebee.co.th/invoicemaker/js/invoicemaker.js'></script>
    <style type="text/css">
        @page {
            size: auto;
            margin: 0mm;
        }

    </style>
    <style type="text/css" media="print">
        @page {
            size: auto;
            /* auto is the initial value */
            margin: 0;
            /* this affects the margin in the printer settings */
        }

    </style>
</head>

<body>
    <div id="page-wrap">
        <div id="header_print">ต้นฉบับใบกำกับอย่างย่อ/ใบเสร็จรับเงิน</div>
        <div id=" customer">

            <div class="col h-100">
                <table id="meta2">
                    <tr>
                        <td colspan="2" style="text-align: left">
                            <div id="address">
                                <b>
                                    ลูกค้า : นายฟหกฟหกฟหก้รฟห้กรฟห้กรฟห้กรฟห้
                                    ฟหกรฟห้กรฟห้กรฟห้กรฟห้กรฟ้หกร้ฟหกasdasdasdawerihas asidhasidh
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
                            <div>QT000123</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" class="meta-head">วันที่ออก</td>
                        <td style="text-align: center">
                            <div id="date">รออัพเดท</div>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        <br>
        <table id="items">
            <tr>
                <th style="text-align: center">ลำดับ</th>
                <th style="text-align: center">สินค้า</th>
                <th style="text-align: center">จำนวน</th>
                <th style="text-align: center">หน่วย</th>
                <th style="text-align: center">ราคาต่อหน่วย</th>
                <th style="text-align: center">จำนวนเงิน</th>
            </tr>
            {{-- วนลูปรายการ --}}
            <tr class="item-row">
                <td style="text-align: center"><span class="score">1</span></td>
                <td class="item-name">
                    <div class="delete-wpr">
                        <div>CEVITA</div>
                    </div>
                </td>
                <td style="text-align: center"><span class="number">1</span></td>
                <td style="text-align: center"><span class="unit">กล่อง</span></td>
                <td style="text-align: center"><span class="unit_price">690</span></td>
                <td style="text-align: center"><span class="price">690</span></td>
            </tr>
            <tr class="item-row">
                <td style="text-align: center"><span class="score">2</span></td>
                <td class="item-name">
                    <div class="delete-wpr">
                        <div>CEVITA CELERY</div>
                    </div>
                </td>
                <td style="text-align: center"><span class="number">1</span></td>
                <td style="text-align: center"><span class="unit"></span>กล่อง</td>
                <td style="text-align: center"><span class="unit_price">390</span></td>
                <td style="text-align: center"><span class="price">390</span></td>
            </tr>
            <tr class="item-row">
                <td style="text-align: center"><span class="score">3</span></td>
                <td class="item-name">
                    <div class="delete-wpr">
                        <div>CEVITA CELERY</div>
                    </div>
                </td>
                <td style="text-align: center"><span class="number">1</span></td>
                <td style="text-align: center"><span class="unit"></span>กล่อง</td>
                <td style="text-align: center"><span class="unit_price">390</span></td>
                <td style="text-align: center"><span class="price">390</span></td>
            </tr>
            {{-- จบลูปรายการ --}}
            <tr>
                <td colspan="4" class="blank"> </td>
                <td colspan="1" class="total-line" style="text-align: center;font-weight: bold;">ยอดรวมสุทธิ</td>
                <td colspan="1" style="text-align: center">0.00 บาท</td>
            </tr>
            <tr>
                <td colspan="4" class="blank"> </td>
                <td colspan="1" class="total-line" style="text-align: center;font-weight: bold;">ส่วนลด</td>
                <td colspan="1" style="text-align: center">0.00 บาท</td>

            </tr>
            <tr>
                <td colspan="4" class="blank"> </td>
                <td colspan="1" class="total-line" style="text-align: center;font-weight: bold;">
                    มูลค่าสินค้าหลังหักส่วนลด</td>

                <td colspan="1" style="text-align: center">0.00 บาท</td>
            </tr>
            <tr>
                <td colspan="4" class="blank"> </td>
                <td colspan="1" class="total-line" style="text-align: center;font-weight: bold;">ภาษีมูลค่าเพิ่ม 7%</td>
                <td colspan="1" style="text-align: center">0.00 บาท</td>
            </tr>

            <tr>
                <td colspan="4" class="blank"> </td>
                <td colspan="1" class="total-line " style="text-align: center;font-weight: bold;">รวมเงิน</td>
                <td colspan="1" style="text-align: center">0.00 บาท</td>
            </tr>
        </table>
        <div id="bidder">
            <h5></h5>
            <h5>ลงชื่อ.............................................ผู้รับเงิน</h5>
        </div>
    </div>

</body>

</html>
