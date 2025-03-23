<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;

class EmployeeFilter extends Component
{
    public $employee_name = '';
    public $employee_id = '';

    public $employees = [];

    public function fetchEmployees()
    {
        $this->employees = Employee::selectRaw("*, CONCAT(firstname, ' ', lastname) as full_name")
            ->whereRaw("CONCAT(firstname, ' ', lastname) LIKE ?", [$this->employee_name . '%'])
            ->limit(20)
            ->get();
    }

    public function setSelected($employee)
    {
        $this->employee_name = $employee['full_name'];
        $this->fetchEmployees();
        $this->emitUp('searchEmployeeById', $employee['employee_id']);
    }

    public function updated()
    {
        $this->fetchEmployees();
        if (!$this->employee_name) {
            $this->emitUp('searchEmployeeById', '');
        }
    }

    public function render()
    {
        return view('livewire.employee-filter');
    }
}
