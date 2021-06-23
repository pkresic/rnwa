<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('pages.employee.list')
            ->with([
                'employees' => Employee::with(['contact'])->get(),
            ]);
    }

    public function details($id)
    {
        return view('pages.employee.details')
            ->with([
                'employee' => Employee::with(['contact', 'department_history'])->findOrFail($id),
            ]);
    }

    public function delete($id)
    {
        Employee::destroy($id);
        return redirect()
            ->route('employee.list');
    }
}
