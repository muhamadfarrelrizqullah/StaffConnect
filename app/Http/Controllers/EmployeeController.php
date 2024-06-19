<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\EmployeeExport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function index()
    {
        $departements = Departement::all();
        $positions = Position::all();
        return view('admin.employee', compact('departements', 'positions'));
    }

    // Read Data
    public function read()
    {
        $data = Employee::join('departements', 'employees.departement_id', '=', 'departements.id')
            ->join('positions', 'employees.position_id', '=', 'positions.id')
            ->select([
                'employees.id',
                'employees.name',
                'employees.email',
                'employees.phone',
                'employees.address',
                'employees.birthdate',
                'departements.id as departement_id',
                'departements.name as departement_name',
                'departements.description as departement_description',
                'positions.id as position_id',
                'positions.title as position_title',
                'positions.level as position_level',
                'positions.description as position_description',
            ])
            ->get();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    // Create Data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees,email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:500',
            'birthdate' => 'required|date|date_format:Y-m-d',
            'departement_name' => 'required|exists:departements,id',
            'position_title' => 'required|exists:positions,id',
        ]);
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->birthdate = $request->birthdate;
        $employee->departement_id = $request->departement_name;
        $employee->position_id = $request->position_title;
        $employee->save();

        return redirect()->back()->with('success', 'Employee added successfully');
    }

    // Delete Data
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json(['message' => 'Employee not found.'], 404);
        }
        $employee->delete();
        return response()->json(['message' => 'Employee deleted successfully.']);
    }

    // Update Data
    public function update(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:15',
                'address' => 'required|string|max:500',
                'birthdate' => 'required|date|date_format:Y-m-d',
                'departement_name' => 'required|exists:departements,id',
                'position_title' => 'required|exists:positions,id',
            ]);
            $employee = Employee::findOrFail($request->id);
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->address = $request->address;
            $employee->birthdate = $request->birthdate;
            $employee->departement_id = $request->departement_name;
            $employee->position_id = $request->position_title;
            $employee->save();
            return response()->json(['success' => 'Employee updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    // Export Excel
    public function export()
    {
        $data = Employee::join('departements', 'employees.departement_id', '=', 'departements.id')
            ->join('positions', 'employees.position_id', '=', 'positions.id')
            ->select([
                'employees.id',
                'employees.name',
                'employees.email',
                'employees.phone',
                'employees.address',
                'employees.birthdate',
                'departements.name as departement_name',
                'departements.description as departement_description',
                'positions.title as position_title',
                'positions.level as position_level',
                'positions.description as position_description',
            ])
            ->get();
        return Excel::download(new EmployeeExport($data), 'employees-report.xlsx');
    }
}
