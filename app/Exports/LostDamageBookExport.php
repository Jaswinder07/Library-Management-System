<?php

namespace App\Exports;

use App\Models\Lostdamagebook;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;




class LostDamageBookExport implements FromQuery, WithHeadings, ShouldAutoSize
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
        return Lostdamagebook::query();
    }

    /**
     * Return Row Heading when Export Data     
     */
    public function headings(): array
    {
        return [
            '#',
            'Book Acc No',
            'Title',
            'Registration No',
            'Department',
            'Member Type',
            'Book Condition',
            'Fine',
        ];
    }
}
