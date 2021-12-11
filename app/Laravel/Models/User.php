<?php

namespace App\Laravel\Models;

use Carbon, Helper;
use App\Laravel\Models\Views\UserGroup;
use Illuminate\Notifications\Notifiable;
use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable, SoftDeletes, DateFormatterTrait;

    protected $table = "user";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'username','email','password','name'
 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function getAvatarAttribute(){

        if($this->filename){
            return "{$this->directory}/resized/{$this->filename}";
        }

        if($this->fb_id){
            return "https://graph.facebook.com/{$this->fb_id}/picture?width=310&height=310#v=1.0";
        }

        return asset('placeholder/user.png');
    }

}
 