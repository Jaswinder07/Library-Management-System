<?php

namespace App\Exports;

use App\Models\Issue;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class IssueBookExport implements FromQuery, WithHeadings, ShouldAutoSize
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
        return Issue::query();
    }


    /**
     * Return Row Heading when Export Data     
     */
    public function headings(): array
    {
        return [
            '#',
            'Issue Id',
            'Book Acc No',
            'Title',
            'Member Registration No',
            'Member Name',
            'Member Type',
            'Department',
            'Issue Date',
            'Due Date',
            'Return Date',
            'Fine',
        ];
    }
}
