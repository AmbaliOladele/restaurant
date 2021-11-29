<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function user() {
        $data = User::all();
        return view('admin.users', compact('data'));
    }

    public function deleteuser($id) {
        $data = User::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function deleteMenu($id) {
        $data = Food::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function foodMenu() {
        $data = Food::all();

        return view('admin.foodMenu', compact('data', $data));
    }

    public function updateView($id) {
        $data = Food::find($id);

        return view('admin.updateView', compact('data', $data ));
    }

    public function update(Request $request, $id) {
        $data = Food::find($id);

        $image = $request->image;
        $imageName = time(). '.' . $image->getClientOriginalExtension();
        $request->image->move('foodImage', $imageName);

        $data->image = $imageName;

        $data->title = $request->input('title');
        $data->price = $request->input('price');
        $data->description = $request->input('description');

        $data->save();

        return redirect()->back();


    }

    public function upload(Request $request) {
        $data = new Food();

        $image = $request->image;
        $imageName = time(). '.' . $image->getClientOriginalExtension();
        $request->image->move('foodImage', $imageName);

        $data->image = $imageName;

        $data->title = $request->input('title');
        $data->price = $request->input('price');
        $data->description = $request->input('description');

        $data->save();

        return redirect()->back();

    }

    public function reservation(Request $request) {

        $data = new Reservation;

        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->guest = $request->input('guest');
        $data->date = $request->input('date');
        $data->time = $request->input('time');
        $data->message = $request->input('message');

        $data->save();

        return redirect()->back();

    }

    public function viewReservation() {

        if (Auth::id()) {
            $data = Reservation::all();

            return view('admin.adminReservation', compact('data',$data));
        } else {
           return redirect('login');
        }



    }

    public function viewChef() {
        $data = Chef::all();
        return view('admin.adminChef', compact('data'));

    }

    public function uploadChef(Request $request) {
        $data = new Chef;

        $image = $request->image;
        $imageName = time(). '.' . $image->getClientOriginalExtension();
        $request->image->move('chefImage', $imageName);

        $data->image = $imageName;
        $data->name = $request->name;
        $data->specialty = $request->specialty;

        $data->save();

        return redirect()->back();
    }

    public function updateChef($id) {
        $data = Chef::find($id);

        return view('admin.updateChef', compact('data'));
    }

    public function deleteChef($id) {
        $data = Chef::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function updateFoodChef(Request $request, $id) {
        $data = Chef::find($id);
        $image = $request->image;

        if ($image) {
            $imageName = time(). '.' . $image->getClientOriginalExtension();
            $request->image->move('chefImage', $imageName);

            $data->image = $imageName;
        }

        $data->name = $request->name;
        $data->specialty = $request->specialty;

        $data->save();

        return redirect()->back();
    }

    public function orders() {
        $data = Order::all();

        return view('admin.orders', compact('data'));
    }

    public function search(Request $request) {
        $search = $request->input('search');

        $data = Order::where('name', 'Like', '%'. $search . '%')
            ->orWhere('food_name', 'Like', '%'. $search . '%')
            ->orWhere('phone_number', 'Like', '%'. $search . '%')
            ->get();

        return view('admin.orders', compact('data'));
    }
}

