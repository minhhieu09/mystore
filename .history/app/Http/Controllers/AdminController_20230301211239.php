<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Models\AdminModel;
use App\Models\ProductComponentModel;
use App\Models\ProductTypeModel;
use App\Models\ProductsColorModel;
use App\Models\ProductsModel;
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
            '64' =>'64GB',
            '128' =>'128GB',
            '512'=>'512GB'
        ];
        $assign['color'] = ProductsColorModel::all();
        return view('admin.list.create',$assign);
    }

    public function edit(){
        $assign['productComponent'] = ProductComponentModel::all();
        $assign['product'] = $assign['productComponent']->product;
        return view('admin.list.edit');
    }
    
    public function store(Request $request)
    {
        $dataRequest = $request->all();
        //Combination to 1 array
        // dd($dataRequest);
        $arr = array();
        for ($i = 0; $i < count($dataRequest['memory']); $i++) {
            $file = $request->file('image')[$i] ?? null;
            $h = [
                'id' => $i,
                'memory' => $dataRequest['memory'][$i],
                'color' => $dataRequest['color'][$i],
                'amount' => $dataRequest['amount'][$i],
                'price' => $dataRequest['price'][$i],
                'image' => $file ? $file->getClientOriginalName() : null
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
        
        
            $dataProduct = [
                'name' => $dataRequest['name'],
                'type' => $dataRequest['type'],
                'description' => $dataRequest['description'],
                'status' => isset($dataRequest['status']) ? 1 : 0
            ];
            
           
            if (!isset($dataRequest['id'])) {
                //Insert product
                $product = ProductsModel::create($dataProduct);
                
            } else {
                //Update product
                $productId = PrductComponentModel::findId($dataRequest['id'])->product->id;
                $product = ProductsModel::update($dataProduct, $productId);
                
            }

            // if (!empty($dataRequest['special'])) {
            //     $product->special()->sync($dataRequest['special']);
            // }

            //Insert Product Component
            $dataProductComponent = array();
                // dd($product);
            foreach ($collect as $data) {
                $row = [
                    'product_id' => $product->id,
                    'memory' => $data['memory'],
                    'color_id' => $data['color'],
                    'amount' => $data['amount'],
                    'price' => $data['price'],
                    'image' => $data['image'],
                    'created_at' => Carbon::now()
                ];

                array_push($dataProductComponent, $row);
            }

            if (isset($dataRequest['id'])) {
                $dataProductComponent = [
                    'memory'    => $dataRequest['memory'][0],
                    'color_id'  => $dataRequest['color'][0],
                    'amount'    => $dataRequest['amount'][0],
                    'price'     => $dataRequest['price'][0],
                    'image'     => $dataRequest['image'][0],
                ];
                if (empty($dataRequest['image'][0])) {
                    unset($dataProductComponent['image']);
                }

                //Check exist product component before update
                $check = [
                    'product_id'    => $productId,
                    'memory'        => $dataRequest['memory'][0],
                    'color'         => $dataRequest['color'][0],
                ];

                if (ProductComponentModel::isExist($check, $dataRequest['id'])) {
                    return redirect()->back()->with(['status' => 'fail', 'message' => 'Thay đổi thất bại']);
                }

                ProductComponentModel::update($dataProductComponent, $dataRequest['id']);
                return redirect()->back()->with(['status' => 'success', 'message' => 'Thay đổi thành công']);
            } else {
                ProductComponentModel::insert($dataProductComponent);
            }

            return redirect()->back()->with(['status' => 'success', 'message' => 'Thêm mới thành công']);
        
            
        
    }

    public function delete($id){
        $component = ProductComponentModel::findOrFail($id);
        $product = $component->product;
        if(ProductComponentModel::where('product_id', $product->id) == 1){
            ProductModel::delete($product->id);
            $product->special()
        }
    }
}