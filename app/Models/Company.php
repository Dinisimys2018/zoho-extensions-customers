<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Сущность с информацией об организациях в Zoho, которые устанавливают расширение.
 * @property int $id ZOHO CRM id
 * @property string $name По-умолчанию в $name пишем email
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 */
class Company extends Model
{
    use SoftDeletes;

     public $incrementing = false;

    protected $guarded = [];

    public function emails()
    {
        $this->hasMany(EmailCompany::class);
    }

    public function installationsExtensions()
    {
        $this->hasMany(InstallationExtension::class);
    }
}
