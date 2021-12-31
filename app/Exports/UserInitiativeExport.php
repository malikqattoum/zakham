<?php

namespace App\Exports;

use App\Models\UserInitiative;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserInitiativeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UserInitiative::all();
    }
}
