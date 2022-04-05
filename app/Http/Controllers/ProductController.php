<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    public function __construct(Product $product){
        $this->product = $product;
    }

    public function index(){

        $product = $this->product->get();
        return $product;
    }

    public function search(){

        $product = $this->product->select("id","ProductName")
            ->get();

        return $product;
    }

    public function create(Request $request){
        $image = $request->file("Picture");
        $data=$request->only([
            "CategoryId",
            "BrandId",
            "ProductName",
            "ProductCode",
            "Stock",
            "Description",
            "Picture",
            "Price"
        ]);

        $imageName = rand(0, 100) . '.' . $image->getClientOriginalName();
        $images = $image->move(public_path("/images/"), $imageName);
        if(isset($images)){
            $imageUrl = url("/images/".$imageName);
            $data["Picture"]=$imageUrl;
            $this->product->create($data);
        }else{
            $this->product->create($data);
        }

        return "Başarılı bir şekilde eklendi";
    }

    public function update(Request $request){
        $image = $request->file("Picture");
        $data=$request->only([
            "CategoryId",
            "BrandId",
            "ProductName",
            "ProductCode",
            "Stock",
            "Description",
            "Picture",
            "Price",
            "id"
        ]);

        $id=$data["id"];

        $imageName = rand(0, 100) . '.' . $image->getClientOriginalName();
        $images = $image->move(public_path("/images/"), $imageName);
        if(isset($images)){
            $imageUrl = url("/images/".$imageName);
            $data["Picture"]=$imageUrl;
            $this->product->where("id",$id)->update($data);
        }else{
            $this->product->where("id",$id)->update($data);
        }

        return "Başarılı bir şekilde güncellendi";
    }

    public function delete(int $id){

        $this->product->where("id",$id)->delete();
        return "Başarılı bir şekilde silindi";
    }
}
