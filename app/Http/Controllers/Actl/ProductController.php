<?php

namespace App\Http\Controllers\Actl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Family;
use App\Models\TaxRate;
use App\Models\UnitMeasure;
use Auth;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller
{
    public function ProductAll() {
        $products = Product::latest()->get();
        return view('backend.product.product_all', compact('products'));
    }

    public function ProductAdd() {
        $families = Family::all();
        $unitMeasures = UnitMeasure::latest()->get();
        $taxRates = TaxRate::latest()->get();
        return view('backend.product.product_add', compact('families', 'unitMeasures', 'taxRates'));
    }

    public function ProductStore(Request $request) {
        $save_url = null;

        if ($request->hasFile('profile_image')) {
            $manager = new ImageManager(new Driver());
            $transformName = hexdec(uniqid()) . "." . $request->file('profile_image')->getClientOriginalExtension();
            $img = $manager->make($request->file('profile_image'));
            $img = $img->resize(200, 200);
            $img->save(base_path('public/backend/assets/images/product/' . $transformName), 80, 'jpeg');
            $save_url = '/backend/assets/images/product/' . $transformName;
        }

        try {
            Product::create([
                'code' => $request->code,
                'description' => $request->description,
                'family' => $request->product_family,
                'unit' => $request->product_unit,
                'taxRateCode' => $request->taxRateCode_Product,
                'image' => $save_url,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);

            $notification = [
                'message' => 'Product Added Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route('product.all')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => 'Product Add Failed: ' . $e->getMessage(),
                'alert-type' => 'error',
            ];

            if ($save_url && file_exists(base_path('public' . $save_url))) {
                unlink(base_path('public' . $save_url));
            }

            return redirect()->route('product.all')->with($notification);
        }
    }

    public function ProductEdit($id) {
        $families = Family::all();
        $unitMeasures = UnitMeasure::all();
        $taxRates = TaxRate::all();
        $product = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('families', 'unitMeasures', 'taxRates', 'product'));
    }

    public function ProductUpdate(Request $request) {
        $product_id = $request->id;
        $product = Product::findOrFail($product_id);
        $save_url = $product->image;
        $oldImagePath = base_path('public' . $product->image);

        if ($request->hasFile('profile_image')) {
            $manager = new ImageManager(new Driver());
            $transformName = hexdec(uniqid()) . "." . $request->file('profile_image')->getClientOriginalExtension();
            $img = $manager->make($request->file('profile_image'));
            $img = $img->resize(200, 200);
            $newImagePath = base_path('public/backend/assets/images/product/' . $transformName);
            $img->save($newImagePath, 80, 'jpeg');
            $save_url = '/backend/assets/images/product/' . $transformName;
        }

        try {
            $product->update([
                'code' => $request->code,
                'description' => $request->description,
                'family' => $request->product_family,
                'unit' => $request->product_unit,
                'taxRateCode' => $request->taxRateCode_Product,
                'image' => $save_url,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);

            if ($request->hasFile('profile_image') && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $notification = [
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route('product.all')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => 'Product Update Failed: ' . $e->getMessage(),
                'alert-type' => 'error',
            ];
            return redirect()->route('product.all')->with($notification);
        }
    }

    public function ProductDelete($id) {
        $product = Product::findOrFail($id);
        $imgPath = base_path('public' . $product->image);

        try {
            $product->delete();
            if (file_exists($imgPath)) {
                unlink($imgPath);
            }

            $notification = [
                'message' => 'Product Deleted Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route('product.all')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => 'Product Delete Failed: ' . $e->getMessage(),
                'alert-type' => 'error',
            ];
            return redirect()->route('product.all')->with($notification);
        }
    }
}
