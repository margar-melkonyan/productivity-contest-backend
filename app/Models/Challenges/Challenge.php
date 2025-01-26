<?php

declare(strict_types=1);

namespace App\Models\Challenges;

use App\Models\Rooms\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Challenge extends Model
{
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function userChallengeCalendars()
    {
        return $this->hasMany(UserChallengeCalendar::class);
    }
}
