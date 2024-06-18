<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\PositionExport;
use Maatwebsite\Excel\Facades\Excel;

class PositionController extends Controller
{
    public function index()
    {
        return view('admin.position');
    }

    // Read Data
    public function read()
    {
        $data = Position::select(['id', 'title', 'level', 'description'])->get();
        return Datatables::of($data)->addIndexColumn()->make(true);
    }

    // Create Data
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'level' => 'required|string|in:Junior,Senior,Manager',
            'description' => 'nullable|string|max:500',
        ]);
        $position = new Position;
        $position->title = $request->title;
        $position->level = $request->level;
        $position->description = $request->description;
        $position->save();

        return redirect()->back()->with('success', 'Position added successfully');
    }

    // Delete Data
    public function destroy($id)
    {
        $position = Position::find($id);
        if (!$position) {
            return response()->json(['message' => 'Position not found.'], 404);
        }
        $position->delete();
        return response()->json(['message' => 'Position deleted successfully.']);
    }

    // Update Data
    public function update(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'level' => 'required|string|in:Junior,Senior,Manager',
                'description' => 'nullable|string|max:500',
            ]);
            $position = Position::findOrFail($request->id);
            $position->title = $request->title;
            $position->level = $request->level;
            $position->description = $request->description;
            $position->save();
            return response()->json(['success' => 'Position updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    // Export Excel
    public function export()
    {
        return Excel::download(new PositionExport, 'positions-report.xlsx');
    }
}
