<?php

namespace Xbigdaddyx\Itsm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'estimate_usage',
        'description',
    ];
    public function __construct()
    {
        $this->table = 'itsm_asset_categories';
    }
}
