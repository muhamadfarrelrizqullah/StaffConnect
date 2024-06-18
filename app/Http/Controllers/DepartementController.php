<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\DepartementExport;
use Maatwebsite\Excel\Facades\Excel;

class DepartementController extends Controller
{
    public function index()
    {
        return view('admin.departement');
    }

    // Read Data
    public function read()
    {
        $data = Departement::select(['id', 'name', 'description'])->get();
        return Datatables::of($data)->addIndexColumn()->make(true);
    }
    
    // Create Data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);
        $departement = new Departement;
        $departement->name = $request->name;
        $departement->description = $request->description;
        $departement->save();

        return redirect()->back()->with('success', 'departement added successfully');
    }
    
    // Delete Data
    public function destroy($id)
    {
        $departement = Departement::find($id);
        if (!$departement) {
            return response()->json(['message' => 'Departement not found.'], 404);
        }
        $departement->delete();
        return response()->json(['message' => 'Departement deleted successfully.']);
    }

    // Update Data
    public function update(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:500',
            ]);
            $departement = Departement::findOrFail($request->id);
            $departement->name = $request->name;
            $departement->description = $request->description;
            $departement->save();
            return response()->json(['success' => 'Departement updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    // Export Excel
    public function export()
    {
        return Excel::download(new DepartementExport, 'departements-report.xlsx');
    }
}
