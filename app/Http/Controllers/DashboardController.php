<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    // Compact Data For Statistic
    public function index()
    {
        $totalEmployees = Employee::count();
        $totalPositions = Position::count();
        $employeeDepartements = Departement::withCount('employee')->get();
        return view('admin.dashboard', compact('totalEmployees', 'totalPositions', 'employeeDepartements'));
    }

    // 3 New Employee Table
    public function read()
    {
        $data = Employee::select(['id', 'name', 'email', 'phone', 'address'])
        ->orderBy('id', 'desc')
        ->take(3)
        ->get();
        return Datatables::of($data)->make(true);
    }
}
