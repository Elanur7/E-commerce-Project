<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
    public function __construct(User $user){
        $this->user = $user;
    }

    public function index(){

        $user = $this->user->get();
        return $user;
    }

    public function create(AuthRequest $request){
        $data=$request->only([
            "name",
            "surname",
            "email",
            "password",
            "telephone"
        ]);

        $data["password"]=bcrypt($data["password"]);

        $this->user->create($data);

        return "Başarılı bir şekilde eklendi";
    }

    public function update(Request $request){
        $data=$request->only([
            "name",
            "surname",
            "email",
            "password",
            "telephone",
            "id"
        ]);

        $data["password"]=bcrypt($data["password"]);

        $id=$data["id"];

        $this->user->where("id",$id)->update($data);

        return "Başarılı bir şekilde güncellendi";
    }

    public function delete(int $id){

        $this->user->where("id",$id)->delete();
        return "Başarılı bir şekilde silindi";
    }
}
