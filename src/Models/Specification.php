<?php

namespace Xbigdaddyx\Itsm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    use HasFactory;
    public function __construct()
    {
        $this->table = 'itsm_specifications';
    }
}
