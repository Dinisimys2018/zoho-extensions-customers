<?php

namespace App\Components\RestApi\Requests\Rules;

use App\Components\RestApi\Requests\Rules\BasicAbstract\SoftBasicValidation;
use Illuminate\Support\Facades\DB;

#[\Attribute]
class ExistsInDB extends SoftBasicValidation
{
    public function __construct(
        private string $table,
        private string $column = 'id',
        private string $connection = 'mysql')
    {
    }

    public function validate(): bool
    {
        return DB::connection($this->connection)
            ->table($this->table)
            ->where($this->column, $this->getField()->getValue())
            ->exists();
    }

    public function getErrorMessage(): string
    {
        return "Record where column [$this->column={$this->getField()->getFullName()}] not exists in table [$this->table]";
    }
}
