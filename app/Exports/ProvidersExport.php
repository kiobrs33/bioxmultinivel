<?php

namespace biox2020\Exports;

use biox2020\Provider;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProvidersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Provider::all();
    }
}
