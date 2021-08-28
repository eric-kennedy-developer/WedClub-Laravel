<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Http\Resources\UserResource as UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;

class UsersController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());   
    }

    public function store(UserRequest $request)
    {
        try {
            
            $image = $request->file('foto_perfil');
            $input['imagename'] = md5(time()).'.'.$image->extension();
        
            $filePath = public_path('/profile');

            $img = Image::make($image->path())->resize(200, 200); // 200 x 200 tamanho da imagem
            
            $User = new User;
            $User->name = $request->name;
            $User->email = $request->email;
            $User->foto_perfil = $input['imagename'];
            $User->password = Hash::make($request->password);
            if($User->save())
            {
                $img->save($filePath.'/'.$input['imagename'], 70); // Só salva se conseguir criar o usuário. 70% da qualidade

                return new UserResource($User);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            return response()->json(['erro' => $ex->errorInfo]);
        }
    }

    public function show($id)
    {
        $User = User::findOrFail($id);
        return new UserResource($User);
    }

    
    public function update(UserUpdateRequest $request)
    {   
    
        try {

            $image = $request->file('foto_perfil');
            $input['imagename'] = md5(time()).'.'.$image->extension();
        
            $filePath = public_path('/profile');

            $img = Image::make($image->path())->resize(200, 200); // 200 x 200 tamanho da imagem
            
            $User = User::findOrFail($request->id);
            $User->name = $request->name;
            $User->email = $request->email;
            $User->foto_perfil = $input['imagename'];
            $User->password = Hash::make($request->password);
            if($User->save())
            {
                $img->save($filePath.'/'.$input['imagename'], 70); // Só salva se conseguir editar o usuário. 70% da qualidade

                return new UserResource($User);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            return response()->json(['erro' => $ex->errorInfo]);
        }
    }
    
    public function destroy($id)
    {
        $User = User::findOrFail($id);
        if($User->delete())
        {
            return response()->json(['msg' => 'Registro excluído com sucesso.', 'id' => $id], 200);
        }
        else{
            return response()->json(['erro' => 'Erro ao excluir registro.'], 400);
        }
    }


}
