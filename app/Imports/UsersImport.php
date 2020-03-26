<?php

namespace App\Imports;

use App\Model\User\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // return new User([
        //     'name'     => $row[0],
        //     'email'    => $row[1],
        //     'yec_id' => $row[2],
        //     'password' => Hash::make($row[2]),
        // ]);

        $user = new User;

        $user->name = $row[1];
        $user->email = $row[3];
        $user->yec_id = $row[2];
        $user->password = $row[4];

        $user->detail()->user_id = $row[0];
        $user->detail()->phone = $row[6];
        $user->detail()->dob = $row[7];
        $user->detail()->address = $row[8];
        $user->detail()->education = $row[9];
        $user->detail()->company = $row[10];
        $user->detail()->role = $row[11];
        $user->detail()->where = $row[12];

        $user->course()->user_id = $row[0];
        $user->course()->course_id = $row[5];

        return $user->save();
    }
}
