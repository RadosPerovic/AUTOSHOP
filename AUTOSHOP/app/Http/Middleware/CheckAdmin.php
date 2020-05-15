<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use \App\Role;
use \App\Role_user;

class CheckAdmin
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
      $roleAdmin=Role::where('name', 'Admin')->first();
      $roleSuperAdmin=Role::where('name', 'SuperAdmin')->first();

      $roleUser=Role_user::where('id_user', $userID)->first();

      if($roleUser->id_role!=$roleAdmin->id && $roleUser->id_role!=$roleSuperAdmin->id)  //provera da li si admin ili super admin!
      {
      return $next($request);
      }
      else{
          return redirect('/home-admin');
      }


    }
}
