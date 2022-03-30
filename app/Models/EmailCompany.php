<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Сущность с информацией об email для компания.
 * Компания может устанавливать разные расширения
 * или одно и то же расширение в разные моменты времени.
 * Емейл может или изменяться, или могут устанавливать разные юзеры с разными емейлами.
 * По-этому для возможности сконтактироваться с клиентом лучше хранить все емейлы.
 * @property int $id
 * @property string $email
 * @property int $company_id
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 */
class EmailCompany extends Model
{
    use SoftDeletes;

    protected $table = 'emails_companies';

    protected $guarded = [];

    public function company()
    {
        $this->belongsTo(Company::class);
    }
}
