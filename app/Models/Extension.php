<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Сущность с информацией об расширениях для Zoho Market
 */
class Extension extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = [];

    public function installations()
    {
        return $this->hasMany(InstallationExtension::class);
    }
}
