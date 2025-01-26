<?php

declare(strict_types=1);

namespace App\Models\Challenges;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChallengeCalendarStatus extends Model
{
    public $table = 'challange_calendar_statuses';

    public function challanges(): HasMany
    {
        return $this->hasMany(Challenge::class);
    }
}
