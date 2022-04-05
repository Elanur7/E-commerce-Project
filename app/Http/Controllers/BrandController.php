<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brand;
    public function __construct(Brand $brand){
        $this->brand = $brand;
    }

    public function index(){

        $brand=$this->brand->get();

        return $brand;
    }

    public function search(){

        $brand = $this->brand->select("id","BrandName")
            ->get();

        return $brand;
    }

    public function create(Request $request){
        $image = $request->file("Picture");
        $data=$request->only([
            "BrandName",
            "BrandCode",
            "Description"
        ]);

        $brand=$this->brand->where("BrandName",$data["BrandName"])->first();

        if(isset($brand)){
            return "Bu marka adına sahip başka marka bulunmaktadır..";
        }
        else {
            $imageName = rand(0, 100) . '.' . $image->getClientOriginalName();
            $images = $image->move(public_path("/images/"), $imageName);
            if(isset($images)){
                $imageUrl = url("/images/".$imageName);
                $data["Picture"]=$imageUrl;
                $this->brand->create($data);
            }else{
                $this->brand->create($data);
            }
        }

        return "Başarılı bir şekilde eklendi";
    }

    public function update(Request $request,int $id){
        $image = $request->file("Picture");
        $data=$request->only([
           "BrandName",
            "BrandCode",
           "Description",
        ]);

        //$id=$data["id"];

        $imageName = rand(0, 100) . '.' . $image->getClientOriginalName();
        $images = $image->move(public_path("/images/"), $imageName);
        if(isset($images)){
            $imageUrl = url("/images/".$imageName);
            $data["Picture"]=$imageUrl;
            $this->brand->where("id",$id)->update($data);
        }else{
            $this->brand->where("id",$id)->update($data);
        }

        return "Başarılı bir şekilde güncellendi";
    }

    public function delete(int $id){

        $this->brand->where("id",$id)->delete();

        return "Başarılı bir şekilde silindi";
    }
}
