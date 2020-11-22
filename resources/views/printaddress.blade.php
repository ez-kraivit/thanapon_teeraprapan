<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="https://www.codebee.co.th/invoicemaker/" />
    <meta http-equiv="content-language" content="th" />

    <link rel=' stylesheet' type='text/css' href='https://www.codebee.co.th/invoicemaker/css/bootstrap.min.css' />
    <link rel='stylesheet' type='text/css' href='{{asset('css/style_print.css')}}' />
    <script type='text/javascript' src='https://www.codebee.co.th/invoicemaker/js/jquery-1.3.2.min.js'></script>
    <script type='text/javascript' src='https://www.codebee.co.th/invoicemaker/js/invoicemaker.js'></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <style type="text/css" media="print">
        @page {
            size: auto;
            margin: 0;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
                font-size: 24px;
            }

        }

    </style>
</head>

<body>
    <style>
        .col,
        .col-1,
        .col-10,
        .col-11,
        .col-12,
        .col-2,
        .col-3,
        .col-4,
        .col-5,
        .col-6,
        .col-7,
        .col-8,
        .col-9,
        .col-auto,
        .col-lg,
        .col-lg-1,
        .col-lg-10,
        .col-lg-11,
        .col-lg-12,
        .col-lg-2,
        .col-lg-3,
        .col-lg-4,
        .col-lg-5,
        .col-lg-6,
        .col-lg-7,
        .col-lg-8,
        .col-lg-9,
        .col-lg-auto,
        .col-md,
        .col-md-1,
        .col-md-10,
        .col-md-11,
        .col-md-12,
        .col-md-2,
        .col-md-3,
        .col-md-4,
        .col-md-5,
        .col-md-6,
        .col-md-7,
        .col-md-8,
        .col-md-9,
        .col-md-auto,
        .col-sm,
        .col-sm-1,
        .col-sm-10,
        .col-sm-11,
        .col-sm-12,
        .col-sm-2,
        .col-sm-3,
        .col-sm-4,
        .col-sm-5,
        .col-sm-6,
        .col-sm-7,
        .col-sm-8,
        .col-sm-9,
        .col-sm-auto,
        .col-xl,
        .col-xl-1,
        .col-xl-10,
        .col-xl-11,
        .col-xl-12,
        .col-xl-2,
        .col-xl-3,
        .col-xl-4,
        .col-xl-5,
        .col-xl-6,
        .col-xl-7,
        .col-xl-8,
        .col-xl-9,
        .col-xl-auto {
            position: relative;
            width: 100%;
            padding-right: 5px;
            padding-left: 5px;
        }

    </style>
    <div style="padding-top: 15px"></div>
    <div class="container-fluid">
        <div class="row ">
            @foreach ($bill as $item)
            <div class="col-xs-3 col-md-3 col-sm-3  pb-2">
                <div class="card h-100 ">
                    <div class="card-body " style="padding-top: 1.25rem;
                padding-left: 1.25rem;
                padding-right: 1.25rem;
                padding-bottom: 0rem;">
                        <div class="card-text">
                            {{$item->detail}}
                        </div>
                        <div class="card-text">
                            @if (($item->cevita) >0)
                            cevita : {{$item->cevita}},
                            @endif
                            @if (($item->celery) >0)
                            celery : {{$item->celery}},
                            @endif
                            @if (($item->orinca_coffee) >0)
                            orinca_coffee : {{$item->orinca_coffee}},
                            @endif
                            ({{$item->total}} {{$item->transport}})
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <script src="{{asset('js/jspdf/dist/jspdf.customfonts.debug.js')}}"></script>
    <script>
        $(function () {
            window.print();
        });

    </script>
</body>

</html>
