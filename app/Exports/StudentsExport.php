<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;


class StudentsExport implements
    FromQuery
{
    use Exportable;
    protected $students;

    public function __construct($students)
    {
        $this->students = $students;
    }

    public function query()
    {
        return Student::query()->with('class')->whereKey($this->students);
    }
    public function map($student): array
    {
        return [
            $student->id,
            $student->email,
            $student->address->country,
            $student->created_at
        ];
    }
}
