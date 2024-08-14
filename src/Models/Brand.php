<?php

namespace Xbigdaddyx\Itsm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'website',
        'logo'
    ];
    public function __construct()
    {
        $this->table = 'itsm_brands';
    }
}
