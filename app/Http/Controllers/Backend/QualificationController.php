<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Qualification;
use Illuminate\Http\Request;

class QualificationController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Enter Qualification',
        ]);

        $qualification = new Qualification();
        $qualification->name = $request->name;
        $qualification->save();

        return redirect('/lectures/add')->with('success', 'Qualification Added');
    }
}
