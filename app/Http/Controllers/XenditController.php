<?php

// namespace App\Http\Controllers\Api\Payment;
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Xendit\Xendit;

class XenditController extends Controller
{
    private $token = "xnd_development_vyWzaUm8VEwj5qvWFhuvtLiqPfJgWYbSNR617U7yPxNkWpSCntYVOrGHhnBeoG0";

    public function getListVa()
    {
        Xendit::setApiKey($this->token);

        $getVABanks = \Xendit\VirtualAccounts::getVABanks();
        return response()->json([
            'data' => $getVABanks
        ])->setStatusCode(200);
        
    }

    public function createVa()
    {
        Xendit::setApiKey($this->token);
    }
}

function clog($msg)
{
    echo "<script>console.log('$msg')</script>";
}
