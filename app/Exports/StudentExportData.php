<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;


class StudentExportData implements FromQuery, WithHeadings, ShouldAutoSize

{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */


    /**
     * Return Data Export in file
     */
    public function query()
    {
        return Student::query();
    }


    /**
     * Return Row Heading when Export Data     
     */
    public function headings(): array
    {
        return [
            '#',
            'Registration No',
            'Name',
            'Course',
            'Year',
            'Department',
            'Session',
            'Gender',
            'Registration Date',
            'Contact',
            'Address',
        ];
    }
}
