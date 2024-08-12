<?php

namespace Xbigdaddyx\Itsm\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserDevice extends Pivot
{
    /**
     * The table associated with the pivot model.
     *
     * @var string
     */

    protected $table = 'itsm_user_device';

    public function device()
    {
        return $this->belongsTo(Device::class, 'device_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
