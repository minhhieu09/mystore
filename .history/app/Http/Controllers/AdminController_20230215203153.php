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
//Insert product
$product = $this->productService->insert($dataProduct);
} else {
//Update product
$productId = $this->productComponentService->findId($dataRequest['id'])->product->id;
$product = $this->productService->update($dataProduct, $productId);
}

if (!empty($dataRequest['special'])) {
$product->special()->sync($dataRequest['special']);
}

//Insert Product Component
$dataProductComponent = array();

foreach ($collect as $data) {
$row = [
product_id' => $product->id,
memory' => $data['memory'],
color_id' => $data['color'],
amount' => $data['amount'],
price' => $data['price'],
image' => $data['image'],
created_at' => Carbon::now()
];

array_push($dataProductComponent, $row);
}

if (isset($dataRequest['id'])) {
$dataProductComponent = [
memory' => $dataRequest['memory'][0],
color_id' => $dataRequest['color'][0],
amount' => $dataRequest['amount'][0],
price' => $dataRequest['price'][0],
image' => $dataRequest['image'][0],
];
if (empty($dataRequest['image'][0])) {
unset($dataProductComponent['image']);
}

//Check exist product component before update
$check = [
product_id' => $productId,
memory' => $dataRequest['memory'][0],
color' => $dataRequest['color'][0],
];

if ($this->productComponentService->isExist($check, $dataRequest['id'])) {
return redirect()->back()->with(['status' => 'fail', 'message' => 'Thay ??????i th????t ba??i']);
}

$this->productComponentService->update($dataProductComponent, $dataRequest['id']);
return redirect()->back()->with(['status' => 'success', 'message' => 'Thay ??????i tha??nh c??ng']);
} else {
$this->productComponentService->insertMulti($dataProductComponent);
}

return redirect()->back()->with(['status' => 'success', 'message' => 'Th??m m????i tha??nh c??ng']);
} catch (\Exception $e) {
return redirect()->back()->with(['status' => 'fail', 'message' => 'Th??m m????i th????t ba??i']);
}

