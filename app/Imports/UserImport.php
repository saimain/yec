<?php

namespace App\Imports;

use App\Model\User\User;
use App\Model\UserDetail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            User::create([
                'name'     => $row[1],
                'email'    => $row[3],
                'yec_id' => $row[2],
                'password' => Hash::make($row[4]),
            ]);

            UserDetail::create([
                'user_id'     => $row[0],
                'phone'    => $row[6],
                'dob' => $row[7],
                'address' => $row[8],
                'education' => $row[9],
                'company' => $row[10],
                'role' => $row[11],
                'where' => $row[12]
            ]);
        }
    }
}
