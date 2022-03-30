<?php

namespace App\Components\RestApi\Requests\Validation\FieldsAttributes;

use App\Components\RestApi\Requests\Validation\FieldsAttributes\BasicAbstract\SoftBasicValidation;
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
            ->where($this->column, $this->getValue())
            ->exists();
    }

    public function getErrorMessage(): string
    {
        return "Record where column [$this->column={$this->getValue()}] not exists in table [$this->table]. DB connection=[$this->connection]";
    }
}
