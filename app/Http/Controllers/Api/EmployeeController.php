<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Hobby;
use App\Models\Category;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderby('id', 'desc')->get();

        return response()->json($employees);
    }
    public function Hobby()
    {
        $hobbys = Hobby::orderby('id', 'desc')->get();

        return response()->json($hobbys);
    }
    public function Category()
    {
        $categorys = Category::orderby('id', 'desc')->get();

        return response()->json($categorys);
    }

    public function store(Request $request)
    {

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->contact_no = $request->contact_no;
        $employee->hobby = $request->hobby;
        $employee->category = $request->category;
        $employee->photo = $request->photo;
        $employee->save();
    

        return response()->json([
            'status' => 'success',
            'employee'   => $employee
        ]);
    }

    public function show($id)
    {
        $employee = employee::find($id);

        return response()->json($employee);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->contact_no = $request->contact_no;
        $employee->hobby = $request->hobby;
        $employee->category = $request->category;
        $employee->photo = $request->photo;
        $employee->save();

        return response()->json([
            'status' => 'success',
            'post'   => $employee
        ]);
    }

    public function destroy($id)
     {
         $employee = Employee::find($id);
         $employee->delete();

         return response()->json('Employee successfully deleted!');
     }
}