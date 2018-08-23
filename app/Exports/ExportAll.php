<?php

namespace App\Exports;

use App\DataTable;
use App\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class ExportAll implements FromQuery, WithStrictNullComparison
{
    use Exportable;

    public function query()
    {
        if(Auth::user()->role == "admin"){
            return DataTable::query()
                ->newQuery('select * from client_VDI_vMobeyTransactions_v1')
                ->orderBy('merchant_name');
        }
        else{
            return DataTable::query()
                ->newQuery('select * from client_VDI_vMobeyTransactions_v1')
                ->where('mid','=',Auth::user()->mid)
                ->orderBy('merchant_name');
        }

    }
}