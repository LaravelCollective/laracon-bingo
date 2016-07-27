<?php

namespace App;

use Laravel\Socialite\Contracts\User as SocialiteUser;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
      'email',
      'password',
      'github_id',
      'facebook_id',
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

    public static function socialite(SocialiteUser $socialiteUser, $provider)
    {
        /** @var User $user */
        $user = static::firstOrNew([
          $provider . '_id' => $socialiteUser->getId(),
        ]);

        if (! $user->exists && $byEmail = User::whereEmail($socialiteUser->getEmail())->first()) {
            $user = $byEmail;
            $user->{$provider . '_id'} = $socialiteUser->getId();
        }

        $user->name = $socialiteUser->getName();
        $user->email = $socialiteUser->getEmail();
        $user->avatar = $socialiteUser->getAvatar();

        $user->save();

        return $user;
    }
}
