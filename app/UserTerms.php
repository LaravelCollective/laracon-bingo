<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTerms extends Model
{
    protected $dates = ['found_at'];

    protected $casts = [
        'checked' => 'boolean'
    ];

    protected $fillable = [
        'term_id',
        'user_id',
    ];

    protected $appends = [
        'name',
    ];

    protected $hidden = [
        'term'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }

    public function getNameAttribute()
    {
        return $this->term->term;
    }

    public function toggleChecked()
    {
        $this->checked = ! $this->checked;
        $this->save();
    }
}
