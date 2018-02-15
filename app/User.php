<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','desc'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public static $rulesCreate = [
      "name"  => 'required|alpha_dash|max:25',
      "desc"  => 'max:100',
    ];
    
    public static $rulesOnUpload = [
      "users" => 'required',
    ];
    
    public static $messages = [
      'name.required'   => '*List name is required.',
      'name:alpha_dash' => '*List name can contain only alph,numeric characters and dashes and underscores.',
      'name:max'        => '*Maximum list name length must be 25 characters.',
      'desc:max'        => '*Maximum description lenght must be 100 characters.',
      'users.required'  => '*Please select a file',
      
    ];
    
    public function validate($data, $rules,$messages)
    {
        $v = Validator::make($data, $rules, $messages);

        if ($v->fails()) {
            $this->errors = $v->errors();
            return false;
        }
        return true;
    }
    
    public function errors()
    {
        return $this->errors;
    }


}
