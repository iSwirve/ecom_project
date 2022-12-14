<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DJual extends Model
{
    use HasFactory;
    protected $table = 'djual';
    protected $fillable = ['invoice_id', 'email_pembeli', 'email_penjual', 'id_barang', 'alamat', 'harga'];
    // public $incrementing    = true;
    public $timestamps      = true;
}
