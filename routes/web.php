<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\userController;
use App\Http\Controllers\XenditController;
use Illuminate\Support\Facades\Route;

use function App\Http\Controllers\alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('homepage');
})->name('home');

Route::get('/toLogin', function(){
    return view('login');
})->name('toLogin');

Route::get('/tokoku', function(){
    return view('tokoku');
})->name('tokoku');

Route::get('/transaksi', function(){
    return view('transaksi');
})->name('transaksi');

Route::get('/verifyseller', function(){
    return view('adminconfver');
})->name('verifyseller');

Route::get('/verifikasi', function(){
    return view('sellerverifikasi');
})->name('verifikasi');

Route::get('/adminconfirmver', [adminController::class, 'doCheckVerifySeller'])->name('adminconfirmver');

Route::view('/senddata', 'sellerverifikasi');
Route::post('/senddata', [userController::class, 'verification'])->name('verify');


Route::view('/verifyAdmin', 'adminconfver');
Route::post('/verifyAdmin', [adminController::class, 'doVerify'])->name('verifyAdmin');

Route::get('/topup', function(){
    return view('topup');
})->name('topup');

Route::get('/goto_profile', function(){
    return view('profile');
})->name('goto_profile');

Route::get('/goto_keamanan', function(){
    return view('keamanan');
})->name('goto_keamanan');

Route::get('/goto_editprof', function(){
    return view('editprofile');
})->name('goto_editprof');
Route::get('/goto_gantipass', function(){
    return view('gantipassword');
})->name('goto_gantipass');

Route::get('/setelan', function(){
    return view('setelan');
})->name('setelan');

Route::get('/toRegister', function(){
    return view('register');
});

Route::get('/gotoadmin_home', function(){
    return view('admin');
});

Route::get('/gotoadmin_verify', function(){
    return view('adminverif');
});

Route::get('/gotoadmin_req', function(){
    return view('req_saldo_admin');
});
Route::get('/gotoupdate', [userController::class,'gotoupdate']);
Route::get('/updatebarang', [userController::class,'updatebarang']);

Route::get('/deletebarang', [userController::class,'deletebarang']);

Route::get('/action_editprofil', [userController::class,'editprofil'])->name('doEditprofil');
Route::get('/action_gantipass', [userController::class,'gantipass'])->name('doGantipass');
Route::get('/register', [userController::class,'doRegister'])->name('register');

Route::get('/login', [userController::class,'doLogin'])->name('login');
Route::get('/acceptreq', [userController::class,'acceptreq'])->name('acceptreq');
Route::get('/rejectreq', [userController::class,'rejectreq'])->name('rejectreq');

Route::get('/isisaldo', [userController::class,'isiSaldo'])->name('isisaldo');

Route::get('/inputbarang', [userController::class,'inputbarang'])->name('inputbarang');

Route::get('/ban',[adminController::class,'doBanOrUnban'])->name('BanOrUnban');
Route::get('/getSphread',[ExcelController::class,'getSphreadExcel'])->name('donwload');
Route::get('/log',[userController::class,'logout']);
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['auth_verification:admin']], function () {
        Route::get('/homepage', function(){
            return view('homepage');
        });
    });
    Route::group(['middleware' => ['auth_verification:user']], function () {
        Route::get('/homepage', function(){
            return view('homepage');
        });

    });
});

Route::get('kategori', function(){
    return view('kategori');
});

//getKatData
Route::view('getKatData', 'kategori');
Route::get('/gotochat', [userController::class, 'gotochat']);
Route::post('getKatData', [userController::class, 'getKatData']);


Route::view('addCart', 'kategori');
Route::post('addCart', [userController::class, 'addtoCart']);


Route::view('mycart', 'cart');
Route::get('/bayar', [userController::class, 'checkout'])->name('bayar');
Route::get('/deletecart', [userController::class, 'deletecart'])->name('deletecart');

Route::get('/goto_riwayat', function(){
    return view('riwayatbeli');
});

Route::post('/sendVerify', [userController::class, 'verifySeller']);

//detailbarang
Route::get('/detail_barang', [userController::class, 'detailbarang']);
Route::post('/addchat', [userController::class, 'addchat']);

Route::get('/paymentMethod', function(){
    return view('paymentMethod');
})->name('paymentMethod');

Route::get('/checkout', function(){
    return view('checkout');
})->name('checkout');

Route::get('/search', [userController::class, 'searchItem']);

Route::get('/xendit/va/list', [XenditController::class, 'getListVa']);
Route::post('/checkoutcart', [XenditController::class, 'createVA']);

Route::get("/pay", function(){
    return view('simulatePayment');
});

Route::post('/simulate', [XenditController::class, 'makePayment']);
