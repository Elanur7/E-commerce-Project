<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    protected $cargo;
    public function __construct(Cargo $cargo){
        $this->cargo = $cargo;
    }

    public function index(){

        $cargo = $this->cargo->get();
        return $cargo;
    }

    public function search(){

        $cargo = $this->cargo->select("id","CargoName")
            ->get();

        return $cargo;
    }

    public function create(Request $request){
        $image = $request->file("Picture");
        $data=$request->only([
            "CargoName",
            "CargoCode",
            "Price",
            "Description"
        ]);

        $imageName = rand(0, 100) . '.' . $image->getClientOriginalName();
        $images = $image->move(public_path("/images/"), $imageName);
        if(isset($images)){
            $imageUrl = url("/images/".$imageName);
            $data["Picture"]=$imageUrl;
            $this->cargo->create($data);
        }else{
            $this->cargo->create($data);
        }

        return "Başarılı bir şekilde eklendi.";
    }

    public function update(Request $request){
        $image = $request->file("Picture");
        $data=$request->only([
            "CargoName",
            "CargoCode",
            "Price",
            "Description",
            "id"
        ]);

        $id=$data["id"];

        $imageName = rand(0, 100) . '.' . $image->getClientOriginalName();
        $images = $image->move(public_path("/images/"), $imageName);
        if(isset($images)){
            $imageUrl = url("/images/".$imageName);
            $data["Picture"]=$imageUrl;
            $this->cargo->where("id",$id)->update($data);
        }else{
            $this->cargo->where("id",$id)->update($data);
        }

        return "Başarılı bir şekilde güncellendi";
    }

    public function delete(int $id){

        $this->cargo->where("id",$id)->delete();
        return "Başarılı bir şekilde silindi";
    }
}
