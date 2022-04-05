<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $role;
    public function __construct(Role $role){
        $this->role = $role;
    }

    public function index(){

        $role = $this->role->get();
        return $role;
    }

    public function create(Request $request){
        $data=$request->only([
            "Name",
        ]);

        $this->role->create($data);

        return "Başarılı bir şekilde eklendi";
    }

    public function update(Request $request){
        $data=$request->only([
            "Name",
            "id"
        ]);

        $id=$data["id"];

        $this->role->where("id",$id)->update($data);

        return "Başarılı bir şekilde güncellendi";
    }

    public function delete(int $id){

        $this->role->where("id",$id)->delete();
        return "Başarılı bir şekilde silindi";
    }
}
