<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    public function getData()
    {
        $data = DB::table($this->table)->get(); 
        return $data;  
    }

    protected $fillable = ['name', 'date', 'people', 'place', 'detail'];
}
