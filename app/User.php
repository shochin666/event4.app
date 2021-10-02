<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Event;
use Illuminate\Auth\Notifications\ResetPassword;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    /**
     * Override to send for password reset notification.
     *
     * @param [type] $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function mylistEvents()
    {
        return $this->belongsToMany(Event::class, 'mylists');
    }

    public function myjoinEvents()
    {
        return $this->belongsToMany(Event::class, 'join_events');
    }

    public function isJoin($event){
        foreach($this->myjoinEvents()->get() as $joinEvent){

            if($event->id == $joinEvent->id){
                return true;
            }
        }
        return false;
    }
    public function isMylist($event){
        foreach($this->mylistEvents()->get() as $joinEvent){

            if($event->id == $joinEvent->id){
                return true;
            }
        }
        return false;
    }
    
}
