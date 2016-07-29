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
      'submitted_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'password',
      'remember_token',
      //'github_id',
      //'facebook_id',
    ];

    ///**
    // * @var array
    // */
    //protected $appends = [
    //  'terms',
    //];

    ///**
    // * @var array
    // */
    //protected $with = [
    //  'terms.term',
    //];

    /**
     * @var array
     */
    protected $dates = [
      'submitted_at',
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

        $user->name = $socialiteUser->getName() ?: '';
        $user->email = $socialiteUser->getEmail();
        $user->avatar = $socialiteUser->getAvatar();

        $user->save();

        return $user;
    }

    /**
     * @return mixed
     */
    public function getTermsAttribute()
    {
        return $this->getRelationValue('terms')->count() == 24 ? $this->getRelationValue('terms') : $this->assignTerms();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|mixed
     */
    public function terms()
    {
        return $this->hasMany(UserTerms::class);

        if ($terms->count() == 0) {
            return $this->assignTerms();
        }

        return $terms;
    }

    /**
     * @return mixed
     */
    public function assignTerms()
    {
        $terms = Term::all()->random(24)->shuffle();

        $terms->each(function ($term) {
            UserTerms::create([
              'term_id' => $term->id,
              'user_id' => $this->id,
            ]);
        });

        return $this->load('terms')->getRelationValue('terms');
    }
}
