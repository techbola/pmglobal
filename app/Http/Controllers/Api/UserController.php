<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UsersResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{

    public function index()
    {
        $res = User::allUsers();
        return response()->json(new UserCollection($res->get()), 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $user = new User();
        $user->username = $request->firstname;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->email = $request->firstname.'@gmail.com';
        $user->password = Hash::make('pass1234');
        $user->save();

        return response()->json(new UsersResource($user), 201);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)){
            return response()->json(["message" => 'User Record not found'], 404);
        }
        return response()->json(new UsersResource($user), 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (is_null($user)){
            return response()->json(["message" => 'User Record not found'], 404);
        }
        $user->update($request->all());
        return response()->json(new UsersResource($user), 200);
    }

    public function delete($id)
    {
        $user = User::find($id);
        if (is_null($user)){
            return response()->json(["message" => 'User Record not found'], 404);
        }
        $user->delete();
        return response()->json(null, 204);
    }
}
