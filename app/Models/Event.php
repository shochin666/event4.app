<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Event extends Model
{
    public function getData()
    {
        $data = DB::table($this->table)->get(); 
        return $data;  
    }

    protected $fillable = ['name', 'date', 'people', 'place', 'detail'];

    public function isOwner(){
        if($this->user_id == Auth::id()){
            return true;
        }

        else false;
    }
}
