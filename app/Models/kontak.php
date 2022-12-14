<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontak extends Model
{
    use HasFactory;
    protected $table = 'kontak';
    protected $primaryKey = 'id';
    protected $fillable = ['email','pemilik'];
    public $incrementing    = true;
    public $timestamps      = true;
}
