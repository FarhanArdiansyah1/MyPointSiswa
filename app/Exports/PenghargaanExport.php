<?php

namespace App\Exports;

use App\Models\Record;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;


class PenghargaansExport implements
    FromQuery
{
    use Exportable;
    protected $record;

    public function __construct($record)
    {
        $this->record = $record;
    }

    public function query()
    {
        return Record::query()->whereKey($this->record);
    }
}
