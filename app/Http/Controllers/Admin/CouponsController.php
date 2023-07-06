<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupons;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CouponsController extends Controller
{
    function read() { 
        $records = Coupons::all();
        return view('admin.coupons.read', compact(['records']));
    }
    function create() { 
        $action = "backend/coupons/create-post";
        return view("admin.coupons.create_update", compact('action'));
    }
    function createPost(Request $request) { 
            $code = $request->input('code');
            $discount_amount = (int)$request->input('amount');
            $quantity = (int)$request->input('quantity');
            $time_start = $request->input('time_start');
            $time_end = $request->input('time_end');
            $time_start = str_replace("T", " ", $time_start).":00";
            $time_end = str_replace("T", " ", $time_end).":00";
            $coupons = new Coupons;
            $coupons->code = $code;
            $coupons->discount_amount = $discount_amount;
            $coupons->quantity = $quantity;
            $coupons->time_start = $time_start;
            $coupons->time_end = $time_end;
            $coupons->save();
            Alert::toast('Đăng nhập thành công', 'success')->position('top-end')->autoClose(2000);
            return redirect(url("backend/coupons"));
    }
    function edit($id) { 
        $action = "backend/coupons/edit-post/".$id;
        $record = Coupons::where("id", "=", $id)->first();
        return view("admin.coupons.create_update", compact(['action', 'record']));
    }
    function editPost(Request $request, $id) { 
            $code = $request->input('code');
            $discount_amount = (int)$request->input('amount') ;
            $quantity = (int)$request->input('quantity');
            $time_start = $request->input('time_start');
            $time_end = $request->input('time_end');
            $coupons = Coupons::find($id);
            if($coupons) {
                $coupons->code = $code;
                $coupons->discount_amount = $discount_amount;
                $coupons->quantity = $quantity;
                $coupons->time_start = $time_start;
                $coupons->time_end = $time_end;
                $coupons->save();
                Alert::toast('Đăng nhập thành công', 'success')->position('top-end')->autoClose(2000);
                return redirect(url("backend/coupons"));
            }
           
    }
    function delete($id) {
        $coupon = Coupons::find($id);
        if($coupon) {
            $coupon->delete();
            return redirect(url("/backend/coupons"));
        }
    }
}