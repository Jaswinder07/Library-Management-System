<?php

namespace App\Exports;

use App\Models\Staffmember;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StaffMemberExport implements FromQuery, WithHeadings, ShouldAutoSize
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
        return Staffmember::query();
    }


    /**
     * Return Row Heading when Export Data     
     */
    public function headings(): array
    {
        return [
            '#',
            'Registration No',
            'Staff Member Name',
            'Designation',
            'Department',
            'Gender',
            'Contact',
            'Address',
            'Registration Date',

        ];
    }
}
