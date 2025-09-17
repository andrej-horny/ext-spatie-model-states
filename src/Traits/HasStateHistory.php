<?php

namespace Dpb\Extension\ModelState\Traits;

use Dpb\Extension\ModelState\Models\StateChange;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasStateHistory
{
    public function stateHistory(): MorphMany
    {
        return $this->morphMany(StateChange::class, 'model')->latest('changed_at');
    }

    public function latestStateChange(): MorphOne
    {
        return $this->morphOne(StateChange::class, 'model')->latestOfMany('changed_at');
    }
}