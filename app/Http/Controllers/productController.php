<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Dompdf\Dompdf;
use Dompdf\Options;
use Milon\Barcode\DNS1D;
class productController extends Controller
{
    public function GetEquipment(){
        return view('equipments');
    }

    public function addProduct(Request $request){
        // print_r($request->all());die();

        $request->validate([
            'product_type'=>'required',
            'product_title'=>'required',
            'product_desc'=>'required',
            'product_location'=>'required',

        ]);

        $number = mt_rand(1000000000,9999999999);
        

        if($this->productCodeExists($number)){
            $number = mt_rand(1000000000,9999999999);
        }
        $request['product_code'] = $number;

        Products::create($request->all());
        return redirect()->back();
    }

    public function productCodeExists($number){
        return Products::whereProductCode($number)->exists();
    }

    // public function ShowProduct($id){
    //     $product = Products::findOrFail($id);
    //     return view('issueProduct', compact('product'));
    // }

    
    
}