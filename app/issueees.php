<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issueees extends Model
{
    protected $fillable=[
        'name',
        'email',
        'phone',
        'msg',
        'building_no',
        'apartment_number',
        'user_id'  ,
    ];
    public function user() {
        return $this -> belongsTo(user::class);
    }
    //
}
