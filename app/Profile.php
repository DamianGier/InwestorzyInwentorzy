<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id','town','state','description','phone_number',
    ];
    public function User()
    {
        return $this->belongsTo('App/User', 'uid');
    }







}
