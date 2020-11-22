<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            height: 842px;
            width: 595px;
            /*margin left/right - 3,81 %*/
            /*margin-left: 22.67px; margin-top: 22.67px; padding-right: -22.67px; margin-bottom: -22.67px*/
            /*label size : 28,57*/
            /*170 px*/
            /* to centre page on screen*/
            margin-left: auto;
            margin-right: auto;
        }

        .lbl {
            width: 174.8px;
            /*height: 130.3px;*/
            height: 131.7px;
            border: 1px solid purple;
            float: left;
        }

        .lbl-inner {
            padding: 3px;
            display: table-cell;
            word-break: break-all;
        }

        .spc {
            width: 8.5px;
            float: left;
        }

    </style>
</head>

<body>
    <div style="border: 1px solid red; width: 100%; height: 100%">
        <div id="inner" style="margin: 22.67px; border: 1px dashed blue;">
            <div class="lbl"><span class="lbl-inner">123456789123456789123456789123456789123456789</span></div>
            <div class="spc">&nbsp;</div>
            <div class="lbl"><span class="lbl-inner">123456789123456789123456789123456789123456789</span></div>
            <div class="spc">&nbsp;</div>
            <div class="lbl"><span class="lbl-inner">123456789123456789123456789123456789123456789</span></div>

</body>

</html>
