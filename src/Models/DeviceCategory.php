<?php

namespace Xbigdaddyx\Itsm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];
    public function __construct()
    {
        $this->table = 'itsm_device_categories';
    }
}
