<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;



class BookExport implements FromQuery, WithHeadings, ShouldAutoSize
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
        return Book::query();
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
            'Author',
            'Publisher',
            'Edition',
            'No. of Copies',
            'Price',
        ];
    }
}
