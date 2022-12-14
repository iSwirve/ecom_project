<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HJual extends Model
{
    use HasFactory;
    protected $table = 'hjual';
    protected $primaryKey = 'invoice_id';
    protected $fillable = ['invoice_id', 'email_pembeli', 'total_pembelian', 'is_complete'];
    // public $incrementing    = true;
    public $timestamps      = true;
}
