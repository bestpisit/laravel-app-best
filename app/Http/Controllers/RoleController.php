<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function addUsers()
    {
        $user = new User();
        $user->name = "Geralt";
        $user->email = "geralt@gmail.com";
        $user->password = encrypt('secret');
        $user->save();
        $roleids = [1, 2];
        $user->roles()->attach($roleids);
        $user = new User();
        $user->name = "Yennefer";
        $user->email = "yennefer@gmail.com";
        $user->password = encrypt('secret');
        $user->save();
        $roleids = [2, 3, 4];
        $user->roles()->attach($roleids);
        $user = new User();
        $user->name = "Triss";
        $user->email = "triss@gmail.com";
        $user->password = encrypt('secret');
        $user->save();
        $roleids = [3, 4, 5];
        $user->roles()->attach($roleids);
        return "Record has been created sucessfully!";
    }
    public function getAllRolesByUser($id)
    {
        $user = User::find($id);
        $roles = "INVALID";
        if($user != null){
            $roles = $user->roles;
        }
        return view('roles_by_user', compact('roles', 'user'));
    }
    public function getAllUsersByRole($id)
    {
        $role = Role::find($id);
        $users = null;
        if($role != null){
            $users = $role->users;
        }   
        return view('users_by_role', compact('role'));
    }

}