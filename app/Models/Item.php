<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name','is_required','is_available','user_id'];
    
    // defines relationship user function with user model
     public function user() {
         return $this->belongsTo(User::class);
   }
}


