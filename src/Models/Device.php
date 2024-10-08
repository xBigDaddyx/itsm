<?php

namespace Xbigdaddyx\Itsm\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Xbigdaddyx\Companion\Models\Company;

class Device extends Model
{
    public function __construct()
    {
        $this->table = 'itsm_devices';
    }
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
