<?php

// namespace App\Http\Controllers\Api\Payment;
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\barangmodel;
use App\Models\request_saldo;
use App\Models\Cart;
use App\Models\HJual;
use App\Models\DJual;


use App\Models\User;
use App\Models\VerificationModel;
use Barang;
use Facade\Ignition\DumpRecorder\Dump;
use GuzzleHttp\Psr7\Message;
// use Hjual;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use Xendit\Xendit;



use App\Models\kontak;

use Exception;

use SebastianBergmann\Environment\Console;
use function App\Http\Controllers\alert as ControllersAlert;

class XenditController extends Controller
{
    private $token = "xnd_development_VeXoqviLcXWnqn1mZUzElKNKMdr7KjAvIYxMhEOiNTf2kWZ0DuNW4mUjqJlvP7E";

    public function getListVa()
    {
        Xendit::setApiKey($this->token);

        $getVABanks = \Xendit\VirtualAccounts::getVABanks();
        $banks = json_encode($getVABanks);
        // session(['key' => 'value']);
        return view('paymentMethod', ['banks' => $banks]);
        // return response()->json($getVABanks);

    }

    public function createVA(Request $req)
    {
        Xendit::setApiKey($this->token);
        $invoice = \uniqid();

        $bankcode = $req->query("method");
        $total = $req->total;
        $email = $req->email;
        // clog($total);
        $params = [
            "external_id" => $invoice,
            "bank_code" => $bankcode,
            "name" => $email,
            "expected_amount" => $total,
            "is_single_use" => true,
            "is_closed" => true
        ];

        $createVa = \Xendit\VirtualAccounts::create($params);
        $vadata = json_encode($createVa);
        HJual::create(
            [
                "invoice_id" => $invoice,
                "email_pembeli" => $email,
                "total_pembelian" => $total,
                "is_complete" => '0'
            ]
        );
        $datacart = Cart::where('email', '=', Auth::user()->email)->get();
        foreach ($datacart as $cart) {
            DJual::create(
                [
                    "invoice_id" => $invoice,
                    "email_pembeli" => $email,
                    "email_penjual" => "aa",
                    "id_barang" => $cart->id_barang,
                    "alamat" => "ex2",
                    "harga" => "0",
                    "is_complete" => '0'
                ]
            );
        }

        return view('checkout', ['vadata' => $vadata]);
    }

    public function verifyPayment(Request $req)
    {
        $invoice = $req->query("invoice");
        Xendit::setApiKey($this->token);
        $params = [
            'types' => 'PAYMENT',
            'query-param' => 'true'
        ];

        $transactions = \Xendit\Transaction::list($params);
        // var_dump($transactions["data"]);
        $isPaid = false;
        foreach ($transactions["data"] as $trans) {
            if ($trans["reference_id"] == $invoice) {
                $isPaid = true;
            }
        }

        if ($isPaid) {
            $hjualtemp = HJual::where('invoice_id', '=', $invoice)->first();
            $hjualtemp->is_complete = 1;
            $hjualtemp->save();

            DJual::where('invoice_id', '=', $invoice)->update(['is_complete' => 1]);
            
            Alert::success('Sukses Verifikasi', 'Terimakasih sudah melakukan pembayaran');
        } else {
            Alert::error('Gagal Verifikasi', 'Kamu belum melakukan pembayaran');
        }


        return redirect("/transaksi");
    }
}

function clog($msg)
{
    echo "<script>console.log('$msg')</script>";
}
