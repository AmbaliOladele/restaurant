<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {

        if (Auth::id()) {
            return redirect('redirects');
        }
        else

        $data = Food::all();
        $dataChef = Chef::all();
        return view('home', compact('data','dataChef'));
    }

    public function redirects()
    {
        $data = Food::all();
        $dataChef = Chef::all();

        $usertype  = Auth::user()->usertype;

        if ($usertype == '1') {
            return view('admin.adminHome');
        }

        else {
            $user_id = Auth::id();
            $count = Cart::where('user_id',$user_id)
                ->count();

            return view('home', compact('data','dataChef','count'));
        }
    }

    public function addToCart(Request $request, $id) {
        $addToCart = Auth::id();

        if($addToCart) {

            $user_id = Auth::id();
            $food_id = $id;
            $quantity = $request->quantity;

            $cart = new Cart;
            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity = $quantity;

            $cart->save();

            return redirect()->back();
        }

        else {
            return redirect('/login');
        }
    }

    public function showCart(Request $request, $id) {

        if (Auth::id() == $id) {
            $count = Cart::where('user_id',$id)->count();

            $data2 = Cart::select('*')->where('user_id', '=', $id)->get();

            $data = Cart::where('user_id',$id)
                ->join('food', 'carts.food_id', '=', 'food.id')
                ->get();

            return view('showCart', compact('count','data','data2'));
        } else {
            return redirect()->back();
        }
    }

    public function removeFromCart($id) {
        $data = Cart::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function confirmOrder(Request $request) {
        foreach ($request->food_name as $key => $food_name) {
            $data = new Order;

            $data->food_name = $food_name;
            $data->price = $request->price[$key];
            $data->quantity = $request->quantity[$key];

            $data->name = $request->name;
            $data->phone_number = $request->phone;
            $data->address = $request->address;

            $data->save();
        }
        return redirect()->back();
    }
}
