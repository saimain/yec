<?php

namespace App\Imports;

use App\Model\UserDetail;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersDetailImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // return new UserDetail([
        //     'user_id'     => $row[0],
        //     'phone'    => $row[6],
        //     'dob' => $row[7],
        //     'address' => $row[8],
        //     'education' => $row[9],
        //     'company' => $row[10],
        //     'role' => $row[11],
        //     'where' => $row[12]
        // ]);

        $detail = new UserDetail();

        $detail->user_id = $row[0];
        $detail->phone = $row[6];
        $detail->dob = $row[7];
        $detail->address = $row[8];
        $detail->education = $row[9];
        $detail->company = $row[10];
        $detail->role = $row[11];
        $detail->where = $row[12];

        $detail->save();
    }
}
