<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use \App\Role;
use \App\Role_user;

class CheckSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $userID=auth()->user()->id;
      $role=Role::where('name', 'SuperAdmin')->first();
      $roleUser=Role_user::where('id_user', $userID)->first();

      if($roleUser->id_role!=$role->id)
      {

          return redirect()->route('getAdmins')->with('alert2', "Opcijama  'Edit Admin'  i 'Dodaj novog admina' mogu pristupiti samo SUPER ADMIN-i! ");
      }
      else{
          return $next($request);
      }
    }
}
