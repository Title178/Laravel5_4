<?php

namespace App\Model;
use softDeletes;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
   protected $fillable = [
        'name',
        'lastname',
        'email',
        'tel',
        'position_id',
        'username',
        'password'
    ];

    public function position() {
        return $this->hasOne(Position::class,'id','position_id');
    }
}
