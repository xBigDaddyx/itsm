<?php

namespace Xbigdaddyx\Itsm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Xbigdaddyx\Companion\Models\Company;

class Asset extends Model
{
    use HasFactory;
    public function __construct()
    {
        $this->table = 'itsm_assets';
    }
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
