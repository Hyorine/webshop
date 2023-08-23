<?php

namespace App\Http\Controllers\AH;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
	
	public function showAll()
	{
		return view("main")->with('modul','Item');
	}
	public function showPart(Request $request){
        
		switch ($request->operation) {
            case 1:
                return view("ItemAddForm")->with('ItemOp','add');
            break;
            case 2:
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:255',
                    'listing_type' => 'required|in:0,1',
                    'price' => 'required|numeric',
                    'available_start' => 'required|date',
                    'available_end' => 'required|date|after_or_equal:available_start',
                    'description' => 'required|string',
                    'image_option' => 'required|in:0,1',
                    'imageUrl' => 'nullable|url',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                try{
                    $user = auth()->user();
                    \DB::beginTransaction();
                     Product::create([
                        'p_name' => $request->name,
                        'p_type' =>  $request->listing_type,
                        'p_price' =>  $request->price,
                        'p_available_start'=> $request->available_start,
                        'p_available_end' => $request->available_end,
                        'p_description' => $request->description,
                        'p_imageUrl' => $request->imageUrl,
                        'p_admin'  =>$user->u_ID
					]);
                    \DB::commit();
                    return view("main")->with('modul','Item');
                }catch (\Exception $e) {
                    \DB::rollBack();
                   return view('main')->with('modul','error')->with('errorMessage',__('messages.ControllerError1'));
                }
            break;
            case 3:
                $Product = Product::all();
                return view("ItemsView")->with('ItemOp','viewAll')->with('Products',$Product);
            break;
            default:
                 return view('main')->with('modul','error')->with('errorMessage',__('messages.ControllerError2'));
        }
	}
}