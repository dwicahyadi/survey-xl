<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ImportOutletController extends Controller
{

    public function __invoke()
    {

        return view('outlet.import');
    }
}
