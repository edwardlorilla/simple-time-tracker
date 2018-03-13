<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'user_id'];
    protected $with = ['user'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function timers()
    {
        return $this->hasMany(Timer::class);
    }
    public function scopeMine($query)
    {
        return $query->whereUserId(auth()->user()->id);
    }
}
