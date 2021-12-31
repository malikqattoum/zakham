<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\UserInitiativeExport;

class ExportController extends Controller
{
    public function fileExportXlsxUsers() 
    {
        return Excel::download(new UsersExport, 'users-collection.xlsx');
    }  

    public function fileExportCsvUsers() 
    {
        return Excel::download(new UsersExport, 'users-collection.csv');
    }

    public function fileExportXlsxUserinitiative() 
    {
        return Excel::download(new UserInitiativeExport, 'users-initiatives-collection.xlsx');
    }  

    public function fileExportCsvUserinitiative() 
    {
        return Excel::download(new UserInitiativeExport, 'users-initiatives-collection.csv');
    }   
}
