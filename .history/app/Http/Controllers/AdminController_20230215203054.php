<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\ProductComponentModel;
use App\Models\ProductTypeModel;
use App\Models\ProductsColorModel;

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
        $assign['memory'] = [
            '64GB',
            '128GB',
            '512GB'
        ];
        $assign['color'] = ProductsColorModel::all();
        return view('admin.list.create',$assign);
    }

    public function edit(){
        $assign['productComponent'] = ProductComponentModel::all();
        $assign['product'] = $assign['productComponent']->product;
        return view('admin.list.edit');
    }
    
    public function store(Request $request){
        $dataRquest = $request->all();
        $arr = array();
        for($i=0;$i<count($dataRquest['memory']);$i++){
            $file = $request -> file('image')[$i] ?? null;
            $h = [
                'id' => $i,
                'memory' => $dataRquest['memory'][$i],
                'color' => $dataRquest['color'][$i],
                'amount' => $dataRquest['amount'][$i],
                'price' => $dataRquest['price'][$i],
                'image' => $file ? $file->getClientOriginalName() : null,
            ];
            array_push($arr, $h);
        }
        //Unique collection
$collect = collect($arr);
for ($i = 0; $i < count($dataRequest['memory']); $i++) {
$query = $collect->where('memory', $dataRequest['memory'][$i])
->where('color', $dataRequest['color'][$i]);

if ($query->count() >= 2) {
$id = $query->first()['id'];
$collect->forget($id);
}
}

try {
$dataProduct = [
name' => $dataRequest['name'],
type' => $dataRequest['type'],
description' => $dataRequest['description'],
status' => isset($dataRequest['status']) ? 1 : 0
];

if (!isset($dataRequest['id'])) {