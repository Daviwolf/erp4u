<?php

namespace App\Http\Controllers\Actl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaxRate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class TaxRateController extends Controller {
    public function TaxRateAll() {
        $taxRates = TaxRate::latest()->get();
        return view('backend.tax_rate.tax_rate_all', compact('taxRates'));
    }

    public function TaxRateAdd() {
        return view('backend.tax_rate.tax_rate_add');
    }

    public function TaxRateStore(Request $request)
    {
        TaxRate::insert([
            'taxRateCode' => $request->taxRateCode,
            'descriptionTaxRate' => $request->descriptionTaxRate,
            'taxRate' => $request->taxRate,
            'created_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);
    
        $notification = array(
            'message' => 'Tax Rate Added Successfully.',
            'alert-type' => 'success',
        );
    
        return redirect()->route('tax_rate.all')->with($notification);
    }
    

    public function TaxRateEdit($id) {
        $taxRate = TaxRate::findOrFail($id);
        return view('backend.tax_rate.tax_rate_edit', compact('taxRate'));
    }

    public function TaxRateUpdate(Request $request, $id)
    {
        $taxRate = TaxRate::findOrFail($id);
    
        $taxRate->update([
            'taxRateCode' => $request->taxRateCode,
            'descriptionTaxRate' => $request->descriptionTaxRate,
            'taxRate' => $request->taxRate,
            'updated_by' => Auth::id(),
        ]);
    
        $notification = array(
            'message' => 'Tax Rate Updated Successfully.',
            'alert-type' => 'success',
        );
    
        return redirect()->route('tax_rate.all')->with($notification);
    }
    

    public function TaxRateDelete($id) {
        TaxRate::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Tax Rate Deleted Successfully.',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}