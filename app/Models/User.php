<?php

namespace App\Models;

use Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;
    use \Rackbeat\UIAvatars\HasAvatar;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['birthday'];
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'birthday',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('first_name', 'like', '%'.$search.'%')
            ->OrWhere('last_name', 'like', '%'.$search.'%')
            ->OrWhere('email', 'like', '%'.$search.'%');
    }

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->password = Hash::make($user->last_name);
        });
    }
    
    public function getAvatar( $size = 64 ) {
        return $this->getGravatar( $this->first_name . $this->last_name, $size );
      }
}
