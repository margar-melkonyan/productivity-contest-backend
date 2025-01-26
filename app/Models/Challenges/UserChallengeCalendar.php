<?php

declare(strict_types=1);

namespace App\Models\Challenges;

use App\Models\User;
use App\Models\Challenges\Challenge;
use App\Models\Challenges\ChallengeCalendarStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserChallengeCalendar extends Model
{
    public function challenge(): BelongsTo
    {
        return $this->belongsTo(Challenge::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(ChallengeCalendarStatus::class, 'challange_status_id');
    }
}
