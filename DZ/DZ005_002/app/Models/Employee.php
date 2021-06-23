<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    protected $primaryKey = 'EmployeeID';
    protected $table = 'employee';

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'ContactID', 'ContactID');
    }

    public function department_history()
    {
        return $this->belongsToMany(Department::class, 'employeedepartmenthistory', 'EmployeeID', 'DepartmentID', 'EmployeeID', 'DepartmentID');
    }
}
