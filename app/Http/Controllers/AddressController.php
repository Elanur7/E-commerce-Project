<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    protected $address;
    public function __construct(Address $address){
        $this->address = $address;
    }

    public function index(){

        $address = $this->address->get();

        return $address;
    }

    public function create(Request $request){
        $data=$request->only([
            "UserId",
            "UserName",
            "AddressDefinition",
            "Name",
            "Surname",
            "IdNumber",
            "City",
            "District",
            "Address",
            "Telephone"
        ]);

        $this->address->create($data);

        return "Başarılı bir şekilde eklendi.";
    }

    public function update(Request $request){
        $data=$request->only([
            "UserId",
            "UserName",
            "AddressDefinition",
            "Name",
            "Surname",
            "IdNumber",
            "City",
            "District",
            "Address",
            "Telephone",
            "id"
        ]);

        $id=$data["id"];

        $this->address->where("id",$id)->update($data);

        return "Başarılı bir şekilde güncellendi";
    }

    public function delete(int $id){

        $this->address->where("id",$id)->delete();

        return "Başarılı bir şekilde silindi.";
    }
}
