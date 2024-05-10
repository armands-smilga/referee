<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeasonGame extends Model
{
    protected $casts = ['date' => 'datetime'];
    protected $fillable = ['user_id', 'date', 'amount_of_games', 'league'];

    // defines relationship user function with user model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}