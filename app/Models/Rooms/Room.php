<?php

declare(strict_types=1);

namespace App\Models\Rooms;

use App\Models\User;
use App\Models\Challenges\Challenge;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Room extends Model
{
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function challenges(): HasMany
    {
        return $this->hasMany(Challenge::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_room')
            ->withPivot('join_at', 'left_at');
    }
}
