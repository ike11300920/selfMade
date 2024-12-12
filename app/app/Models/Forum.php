<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    
    public function isLikedBy($user): bool {
        return Interest::where('user_id', $user->id)->where('forum_id', $this->id)->first() !==null;
    }
}
