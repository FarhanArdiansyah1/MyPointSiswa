<?php

namespace App\Exports;

use App\Models\Record;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class PenghargaansExport implements 
FromQuery, 
WithMapping,
WithHeadings,
ShouldAutoSize
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

    public function map($record): array
    {
        return [
            $record->getsiswa->name,
            $record->getsiswa->kelas,
            $record->getsiswa->nis_nim_nik,
            $record->prestasi,
            $record->poin,
            $record->getpelapor->name,
            $record->created_at
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Kelas',
            'NIS',
            'Prestasi',
            'poin'
        ];
    }
}
