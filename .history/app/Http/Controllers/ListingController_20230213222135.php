<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ListingController extends Controller
{
    //
    public function index(Request $request, $modelName) {
        $adminUser = Auth::guard('admins')->user();
        $model = '\App\Models\{Models}\'. ucfirst($modelName);
        $records= $model::paginate(1);
        return view('admin.list.listing',[
            'user' => $adminUser,
            'records' => $records,

        ]);
    }
}
