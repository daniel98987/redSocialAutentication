<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create() {
        
        return view('auth.login');
    }
    public function createRegister() {
        
        return view('auth.register');
    }

    public function store() {
        
        if(auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again',
            ]);

        } 

        return redirect()->to('/grupos');
    
    }

    public function destroy() {

        auth()->logout();

        return redirect()->to('/login');
    }
    
    public function postCreateUser(Request $req){




        $p = new User();
        $p->nickname = $req->nickname;
        $p->name =  ($req->name);
        $p->surnames = $req->surnames;
        $p->email = $req->email;
        $p->password =bcrypt($req->password) ;
      
        $result=$p->save();
        if($result){
    
            return redirect()->action([LoginController::class, 'create']);

        }else{
            return ["result"=>"Data no guardada"];

        }

    }
}
