<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Сущность с информацией об установленных расширениях разными компаниями Company.
 * У одной компании может быть установлено несколько расширений.
 */
class InstallationExtension extends Model
{
    use SoftDeletes;

    protected $table = 'installations_extensions';

    protected $guarded = [];

    public function company()
    {
        $this->belongsTo(Company::class);
    }

    public function extension()
    {
        $this->belongsTo(Extension::class);
    }

    public function scopeByCompanyId(Builder $query, int $companyId): Builder
    {
        return $query->where('company_id', $companyId);
    }

    public function scopeByExtensionId(Builder $query, int $extensionId): Builder
    {
        return $query->where('extension_id', $extensionId);
    }
}
