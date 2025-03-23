<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['name','layer','unit','base','comment','teacher_id','stop_flg'];
    public function user(){
        return $this->belongsTo('App\Model\Teacher','teacher_id','id');
    }
}
