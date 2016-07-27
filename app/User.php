<?php

namespace App;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Eloquent\Collection;
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
      'github_id',
      'facebook_id',
    ];

    /**
     * @var array
     */
    protected $appends = [
      'terms',
    ];

    /**
     * @param SocialiteUser $socialiteUser
     * @param string        $provider
     *
     * @return User
     */
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

    /**
     * @return Collection
     */
    public function getTermsAttribute()
    {
        $faker = Factory::create();
        $seed = preg_replace('/[^0-9]/', '', md5($this->email));
        $faker->seed($seed);

        return Collection::make($faker->randomElements(Term::all()->all(), 25));
    }
}
