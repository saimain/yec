<?php

namespace App\Imports;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersCourseImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $now = Carbon::now();
        $data = array('user_id' => $row[0], 'course_id' => $row[5], 'start_da');
        DB::table('course_user')->insert($data);
    }
}
