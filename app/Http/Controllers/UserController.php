<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\EmployeeExperience;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $pageLimit = 10;

        $employees = DB::table('users')
            ->join('employee_applied_jobs', 'users.id', '=', 'employee_applied_jobs.user_id')
            ->join('jobs', 'jobs.id', '=', 'employee_applied_jobs.job_id')
            ->select('users.*', 'jobs.title as job_title')
            ->where('users.user_type', 2)
            ->orderBy('employee_applied_jobs.created_at', 'desc')
            ->paginate($pageLimit);

        $pageNum = ($request->page) ? $request->page : 1;
        $startIndex = ($pageNum - 1) * $pageLimit + 1;
        $endIndex = ($startIndex - 1) + $pageLimit;
        if ($endIndex > $employees->total()) {
            $endIndex = $employees->total();
        }
        return view('employees.index', compact('employees', 'startIndex', 'endIndex'));
    }

    public function view($id)
    {
        $employee = DB::table('users')
            ->where('users.id', $id)
            ->get()
            ->toArray();

        $educations = DB::table('employee_educations')
            ->where('employee_educations.user_id', $id)
            ->get()
            ->toArray();

        $experiences = DB::table('employee_experiences')
            ->where('employee_experiences.user_id', $id)
            ->get()
            ->toArray();

        $employeeExperience = new EmployeeExperience();
        $employmentTypes = $employeeExperience->getEmployementTypes();
        foreach($experiences as $key => $exp) {
            $experiences[$key]->employment_type = $employmentTypes[$exp->employment_type];
        }

        $res = [
            'data' => [
                'employee' => $employee[0],
                'educations' => $educations,
                'experiences' => $experiences,
            ]
        ];

        return json_encode($res);
    }
}
