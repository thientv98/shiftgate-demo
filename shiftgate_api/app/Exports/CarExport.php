<?php

namespace App\Exports;

use App\Car;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class CarExport implements FromView
{
    protected $cars = null;

    public function __construct($data)
    {
        $this->cars = $data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.car', [
            'cars' => $this->cars
        ]);
    }
}
