<?php


namespace App\Http\Controllers;


use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('pages.department.list')
            ->with([
                'departments' => Department::all(),
            ]);
    }

    public function details($id)
    {
        return view('pages.department.details')
            ->with([
                'department' => Department::query()->findOrFail($id),
            ]);
    }
}
