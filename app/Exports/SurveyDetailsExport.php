<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SurveyDetailsExport implements FromCollection, WithHeadings
{

    public $surveysData;

    public function __construct($surveysData)
    {
        $this->surveysData = $surveysData;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(): \Illuminate\Support\Collection
    {
        return $this->surveysData;
    }

    public function headings(): array
    {
        return [
            'DateTime',
            'SurveyID',
            'Surveyor',
            'Dealer',
            'Cluster',
            'Micro Cluster',
            'Province',
            'City',
            'Subdistrict',
            'MSISDN',
            'Outlet Name',
            'Outlet Type',
            'Questions',
            'Response',
            'Status'
        ];
    }
}
