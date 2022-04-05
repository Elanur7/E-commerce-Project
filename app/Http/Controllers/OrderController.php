<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $order;
    public function __construct(Order $order){
        $this->order = $order;
    }

    public function index(){

        $order = $this->order->get();
        return $order;
    }

    public function create(Request $request){
        $data=$request->only([
            "BrandId",
            "BrandName",
            "CategoryId",
            "CategoryName",
            "ProductId",
            "ProductName",
            "CargoId",
            "CargoName",
            "Status",
            "Price"
        ]);


        $this->order->create($data);

        return "Başarılı bir şekilde eklendi";
    }

    public function update(Request $request){
        $data=$request->only([
            "BrandId",
            "BrandName",
            "CategoryId",
            "CategoryName",
            "ProductId",
            "ProductName",
            "CargoId",
            "CargoName",
            "Status",
            "Price",
            "id"
        ]);

        $id=$data["id"];

        $this->order->where("id",$id)->update($data);

        return "Başarılı bir şekilde güncellendi";
    }

    public function delete(int $id){

        $result['data'] = $this->order->where("id",$id)->delete();
        return "Başarılı bir şekilde silindi";
    }
}
