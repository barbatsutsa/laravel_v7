<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'last_login', 'avatar'
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
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    public function createOrUpdateUserWithSocialite(array $data)
    {
        $user = self::where('email', $data['email'])->first();
        if(!$user) {
            $password = '12345678';
            $user =  self::create([
                'name'    => $data['name'],
                'email'   => $data['email'],
                'password' => Hash::make($password),
                'avatar'   => $data['avatar']
            ]);
            if($user) {
                \Auth::loginUsingId($user->id);
                return $user;
            }
        }else {
            $check =  $user->update($data);
            if($check) {
                \Auth::loginUsingId($user->id);
                return $user;
            }
        }

        return false;
    }
}
