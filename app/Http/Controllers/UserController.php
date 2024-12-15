<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Http\Requests\UserRequest;
use App\Models\User;

use Exception;

class UserController extends Controller
{

    public function index(): View
    {
        $users = User::orderBy('id','DESC')->paginate();
        return view('user.index', [ 'users' => $users ]);
    }

    public function store(UserRequest $request){
        $request->validate(['password' => 'required']);
        try{
            $data = $request->all();
            $data["password"] = bcrypt($data["password"]);
            $data["created_by"] = auth()->user()->id;
            User::create($data);
            flash()->success('Utilizador criado com successo.');
        }catch(Exception){
            flash()->error('Utilizador não foi criado com sucesso.');
        }finally{
            return redirect()->route('users.index');
        }
    }

    public function update(UserRequest $request, User $user){
        try{
            $data = $request->only(['name', 'email']);
            $data["updated_by"] = auth()->user()->id;
            $user->update($data);
            flash()->success('Utilizador foi editado com successo.');
        }catch(Exception){
            flash()->error('Utilizador não foi editado com sucesso.');
        }finally{
            return redirect()->route('users.index');
        }
    }

    public function destroy(User $user){
        try{
            $user->delete();
            flash()->success('Utilizador foi eliminado com successo.');
        }catch(Exception){
            flash()->error('Utilizador não foi eliminado com sucesso.');
        }finally{
            return redirect()->route('users.index');
        }
    }

}
