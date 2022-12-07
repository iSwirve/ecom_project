<?php

// namespace App\Http\Controllers\Api\Payment;
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\barangmodel;
use App\Models\request_saldo;
use App\Models\Cart;

use App\Models\User;
use App\Models\VerificationModel;
use Barang;
use Facade\Ignition\DumpRecorder\Dump;
use GuzzleHttp\Psr7\Message;
use Hjual;
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
        $bankcode = $req->query("method");
        $total = $req->total;
        $email = $req->email;
        clog($total);
        $params = [
            "external_id" => \uniqid(),
            "bank_code" => $bankcode,
            "name" => $email,
            "expected_amount" => $total,
            "is_closed" =>true
        ];

        $createVa = \Xendit\VirtualAccounts::create($params);
        $vadata = json_encode($createVa);
        return view('checkout', ['vadata' => $vadata]);
        
    }

    
}

function clog($msg)
{
    echo "<script>console.log('$msg')</script>";
}
