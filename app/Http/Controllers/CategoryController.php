<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;
    public function __construct(Category $category){
        $this->category = $category;
    }

    public function index(){

        $category = $this->category->get();
        return $category;
    }

    public function search(){

        $category = $this->category->select("id","CategoryName")
            ->get();

        return $category;
    }

    public function create(Request $request){
        $image = $request->file("Picture");
        $data=$request->only([
            "CategoryName",
            "CategoryCode",
            "Description"
        ]);

        $imageName = rand(0, 100) . '.' . $image->getClientOriginalName();
        $images = $image->move(public_path("/images/"), $imageName);
        if(isset($images)){
            $imageUrl = url("/images/".$imageName);
            $data["Picture"]=$imageUrl;
            $this->category->create($data);
        }else{
            $this->category->create($data);
        }

        return "Başarılı bir şekilde eklendi";
    }

    public function update(Request $request){
        $image = $request->file("Picture");
        $data=$request->only([
            "CategoryName",
            "CategoryCode",
            "Description",
            "id"
        ]);

        $id=$data["id"];

        $imageName = rand(0, 100) . '.' . $image->getClientOriginalName();
        $images = $image->move(public_path("/images/"), $imageName);
        if(isset($images)){
            $imageUrl = url("/images/".$imageName);
            $data["Picture"]=$imageUrl;
            $this->category->where("id",$id)->update($data);
        }else{
            $this->category->where("id",$id)->update($data);
        }

        return "Başarılı bir şekilde güncellendi";
    }

    public function delete(int $id){

        $this->category->where("id",$id)->delete();
        return "Başarılı bir şekilde silindi";
    }
}
