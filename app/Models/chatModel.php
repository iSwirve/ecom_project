<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chatModel extends Model
{
    use HasFactory;
    protected $table = 'chat';
    protected $primaryKey = 'id';
    protected $fillable = ['message', 'pengirim','penerima'];
    public $incrementing    = true;
    public $timestamps      = true;
}
