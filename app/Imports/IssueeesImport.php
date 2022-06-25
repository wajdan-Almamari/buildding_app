<?php

namespace App\Imports;
use\Auth;
use App\Issueees;

use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;


class IssueeesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Issueees([
            //

                'name'     => $row[0],
                'email'    => $row[1],
                'phone'    => $row[2],
                'msg'    => $row[3],
                'building_no'    => $row[4],
                'apartment_number'    => $row[5],
                'user_id'    => Auth::user()->id,//to take direct from user login

             ]);

    }
}
