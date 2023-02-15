<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\ProductComponentModel;
use App\Models\ProductTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function dashboard()
    {
        $adminUser = Auth::guard('admins')->user();
        return view('admin.index',['user' => $adminUser]);
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $data = $request->only(['email', 'password']);
        
        
        if (Auth::guard('admins')->attempt($data)) {
        
            return view('admin.index');
        }else{ 
            return redirect('admin/login');
        }
    }
    public function admin(){
        $data = AdminModel::paginate(5);

        return view('admin.list.admin',['data' => $data]);
    }
    public function loginout(){
        Auth::guard('admins')->logout();
    }

    public function create (){
        $assign['data'] = ProductTypeModel::all();
        $assign['memory'] = ProductComponentModel::all();
        $assign['color'] = ProductColorModel::all();
        return view('admin.list.create',$assign);
    }

    public function edit(){
        $assign['productComponent'] = ProductComponentModel::all();
        $assign['product'] = $assign['productComponent']->product;
        return view('admin.list.edit');
    }
    
}
