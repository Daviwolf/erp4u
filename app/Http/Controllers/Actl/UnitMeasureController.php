<?php

namespace App\Http\Controllers\Actl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UnitMeasure; // Importação correta do modelo
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class UnitMeasureController extends Controller
{
    public function UnitMeasureAll() {
        $unitMeasures = UnitMeasure::all();
        return view('backend.unit_measure.unit_measure_all', compact('unitMeasures'));
    }

    public function UnitMeasureAdd()
    {
        return view('backend.unit_measure.unit_measure_add');
    }

    public function UnitMeasureStore(Request $request)
    {
        UnitMeasure::create([
            'unit' => $request->unit,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        $notification = array(
            'message' => 'Unit Measure Added Successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('unit_measures.all')->with($notification);
    }

    public function UnitMeasureEdit($id)
    {
        $unitMeasure = UnitMeasure::findOrFail($id);
        return view('backend.unit_measure.unit_measure_edit', compact('unitMeasure'));
    }

    public function UnitMeasureUpdate(Request $request, $id)
    {
        $unitMeasure = UnitMeasure::findOrFail($id);

        $unitMeasure->update([
            'unit' => $request->unit,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        $notification = array(
            'message' => 'Unit Measure Updated Successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('unit_measures.all')->with($notification);
    }

    public function UnitMeasureDelete($id)
    {
        UnitMeasure::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Unit Measure Deleted Successfully.',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
