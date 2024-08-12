<?php

namespace Xbigdaddyx\Itsm\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Xbigdaddyx\Itsm\Models\UserDevice;

trait HasDevices
{
    public function devices(): HasMany
    {
        return $this->hasMany(UserDevice::class);
    }
}
