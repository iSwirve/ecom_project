<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chatdata extends Model
{
    use HasFactory;
    protected $table = 'chatdata';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','message','id_chat'];
    public $timestamps      = true;
}
