<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use App\Bill;

class GeneralController extends Controller
{
    public function indexhome()
    {
        return view('home');
    }
    public function indexlistcsv()
    {
        try {
            $bill = Bill::where('status', '=', 'on')->orWhere('status', '=', 'print')->orderBy('created_at', 'DESC')->get();

            return view('list_csv')->with(['bill' => $bill]);
        } catch (\Throwable $th) {
            return redirect(route('home'));
        }
    }
    public function indexlistcsvmonth()
    {
        try {
            $bill = Bill::where('status', '=', 'on')->orWhere('status', '=', 'print')->orderBy('created_at', 'DESC')->get();

            return view('list_month')->with(['bill' => $bill]);
        } catch (\Throwable $th) {
            return redirect(route('home'));
        }
    }
    public function indexprint()
    {
        try {
            return view('print_receipt');
        } catch (\Throwable $th) {
            return redirect(route('home'));
        }
    }
    public function indexprintaddress()
    {
        try {
            $bill = Bill::where('status', '=', 'on')->orderBy('created_at', 'DESC')->get();
            // $bill = Bill::where('status', '=', 'on')->orderBy('created_at', 'DESC')->limit(24)->get();
            // foreach ($bill as $value) {
            //     Bill::find($value->id)->update([
            //         "status" => "print"
            //     ]);
            // }
            return view('printaddress')->with(['bill' => $bill]);
        } catch (\Throwable $th) {
            return redirect(route('home'));
        }
    }
    public function import_csv(Request $request)
    {
        try {
            $file_data = fopen($request->csv_file, 'r');
            $column = fgetcsv($file_data);
            while ($row = fgetcsv($file_data)) {
                $row_data[] = array(
                    'data_date'  => $row[0],
                    'data_detail'  => $row[1],
                    'data_prod1'  => $row[2],
                    'data_prod2'  => $row[3],
                    'data_prod3'  => $row[4],
                    'data_total'  => $row[5],
                    'data_nettotal'  => $row[6],
                    'data_discount'  => $row[7],
                    'data_vat'  => $row[8],
                    'data_products_value_discount'  => $row[9],
                    'data_shipping_cost' => $row[10],
                    'data_transport' => $row[11],
                );
            }
            return response()->json(['column' => $column, 'row_data' => $row_data]);
        } catch (\Throwable $th) {
            return redirect(route('home'));
        }
    }
    public function check_csv(Request $request)
    {
        try {
            // dd(json_decode($request->csv_detail));
            $data = json_decode($request->csv_detail);
            // dd($data);
            foreach ($data as $key) {
                $random  = "BT" . $this->quickRandom(8);
                $bill = Bill::create([
                    'number_bill' => $random,
                    'detail' => $key->detail,
                    'cevita' => $key->cevita,
                    'celery' => $key->celery,
                    'orinca_coffee' => $key->orinca_coffee,
                    'products_value_discount' => $key->products_value_discount,
                    'discount' => $key->discount,
                    'vat' => $key->vat,
                    'net_total' => $key->net_total,
                    'total' => $key->total,
                    'status' => 'on',
                    'shipping_cost' => $key->shipping_cost,
                    'transport' => $key->transport,
                    'updated_at' => $key->updated_at
                ]);
            }
            return redirect(route('home'))->with(['SuccessInsertCsv' => 'Success Insert CSV']);
        } catch (\Throwable $th) {
            return redirect(route('home'));
        }
    }
    public static function quickRandom($length = 8)
    {
        $pool = '0123456789';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
    public static function showcsv(Request $request, $id)
    {
        try {
            $bill = Bill::where('number_bill', '=', $id)->first();
            $productsarray = [
                "cevita" => $bill->cevita,
                "celery" => $bill->celery,
                "orinca_coffee" => $bill->orinca_coffee,
            ];
            return view('print')->with(['bill' => $bill, 'productsarrays' => $productsarray]);
        } catch (\Throwable $th) {
            return redirect(route('home'));
        }
    }
    public static function delete_csv(Request $request, $id)
    {
        try {
            Bill::find($id)->update([
                'status' => 'off'
            ]);
            return redirect(route('list.csv'))->with(['SuccessDeleteCsv' => 'Success Delete CSV']);
        } catch (\Throwable $th) {
            return redirect(route('home'));
        }
    }
    public static function donwloadcsv(Request $request, $id)
    {
        $bill = Bill::where('number_bill', '=', $id)->first();
        // dd($bill);
        // $pdf = PDF::loadView('print', ['bill' => $bill]);
        // $pdf = PDF::loadView('print', compact('bill'));
        // return $pdf->download($id . '.pdf');
        // PDF::loadView('print', ['bill' => $bill])->download($id . '.pdf');
    }
    public static function check_csv_month(Request $request)
    {
        try {
            $startdate = Carbon::parse($request->startdate)->format('Y-m-d');
            $enddate = Carbon::parse($request->enddate)->format('Y-m-d');
            $bill = Bill::whereBetween('updated_at', [$startdate, $enddate])->where('status', '=', 'on')->get();
            if (count($bill) > 0) {
                return view('print_month')->with(['bills' => $bill]);
            } else {
                return redirect(route('list.csv.month'))->with(['NotData' => 'ข้อมูลไม่มี']);
            }
        } catch (\Throwable $th) {
            return redirect(route('home'));
        }
    }
}