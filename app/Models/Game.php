<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    use HasFactory;

    // these 2 casted to ensure that the data is stored in database and is consistent with it
    protected $fillable = ['user_id','game_date','league','start_time','number_of_games'];
    protected $casts = ['game_date' =>'datetime:y-m-d','start_time' => 'datetime:h:i:s'];

    // defines relationship user function with user model
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}