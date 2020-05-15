<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use \App\Role;
use \App\Order;
use \App\Role_user;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;


class AdminController extends Controller
{

  public function index()
  {
    $data=array('artikli' => Article::paginate(12));
    return view('adminArticleDashboard')->with($data);

  }

  public function getAddArticle()
  {
    $data = array('artikal' => new Article ,
                  'isNew'=>1);
    return view('adminAddArtical')->with($data);
  }

  public function postAddArticle(Request $request)
  {
    if($request->input('button')==1)
    {
    $noviArtikal=new Article;
    $noviArtikal->naziv=$request->input('naziv');
    $noviArtikal->marka=$request->input('marka');
    $noviArtikal->cena=$request->input('cena');
    $noviArtikal->kolicina=$request->input('kolicina');
    $noviArtikal->opis=$request->input('opis');

    $noviArtikal->save();
      return redirect()->route('getAddArticle')->with('alert', 'Uspesno ste uneli artikal');
  }
  else{
    $noviArtikal=Article::where('id', $request->input('id'))->first();
    $noviArtikal->naziv=$request->input('naziv');
    $noviArtikal->marka=$request->input('marka');
    $noviArtikal->cena=$request->input('cena');
    $noviArtikal->kolicina=$request->input('kolicina');
    $noviArtikal->opis=$request->input('opis');

    $noviArtikal->save();
    return redirect()->route('getAddArticle')->with('alert', 'Uspesno ste izmenili artikal');
  }



  }

  public function edit(Request $request, $id)
  {
      switch ($request->input('button')) {
        case 'edit':
          $data = array('artikal' => Article::where('id', $id)->first() ,
                        'isNew'=> 0);
          return view('adminAddArtical')->with($data);
          break;

      case 'delete':
          $deleteArtikal=Article::where('id', $id)->first();
          $deleteArtikal->delete();
          return redirect()->route('admin')->with('alert', 'Uspesno ste obrisali artikal!');
          break;
      }



  }


  public function getAdmins()
  {

    $roleAdmin=Role::where('name', 'Admin')->first();
    $roleAdminUser=Role_user::where('id_role', $roleAdmin->id)->get();
    $nizIDAdmina = array();
    foreach($roleAdminUser as $admin)
    {
      array_push($nizIDAdmina, $admin->id_user);
    }
    $nizAdmina = array();
    for($i=0;$i<count($nizIDAdmina);$i++)
    {
      array_push($nizAdmina, $admin=User::where('id', $nizIDAdmina[$i])->first() );
    }



    $roleSuperAdmin=Role::where('name', 'SuperAdmin')->first();
    $roleSuperUser=Role_user::where('id_role', $roleSuperAdmin->id)->get();
    $nizIDSuperAdmina = array();
    foreach($roleSuperUser as $superadmin)
    {
      array_push($nizIDSuperAdmina, $superadmin->id_user);
    }
    $nizSuperAdmina = array();
    for($i=0;$i<count($nizIDSuperAdmina);$i++)
    {
      array_push($nizSuperAdmina, $superadmin=User::where('id', $nizIDSuperAdmina[$i])->first() );
    }

    $data = array('admini' => $nizAdmina ,
                  'superadmini' => $nizSuperAdmina);
    return view('adminAdminsDashboard')->with($data);






  }



  public function getUsers()
  {
    $roleUser=Role::where('name', 'User')->first();
    $roleUserUser=Role_user::where('id_role', $roleUser->id)->get();
    $nizIDUser = array();
    foreach($roleUserUser as $user)
    {
      array_push($nizIDUser, $user->id_user);
    }
    $nizUsers = array();
    for($i=0;$i<count($nizIDUser);$i++)
    {
      array_push($nizUsers, $user=User::where('id', $nizIDUser[$i])->first() );
    }





    $data = array('users' => $nizUsers);
    return view('adminUsersDashboard')->with($data);
  }


  public function getAddUserAdmin()
  {
    $data = array('user' => $user=new User ,
  'isNew'=>1);
    return view('adminAddUserAdmin')->with($data);
  }


  public function postAddUserAdmin(Request $request)
  {
    if($request->input('button')==1)
    {

    $user=new User;
    $user->name=$request->input('name');
    $user->email=$request->input('email');
    $user->password=Hash::make($request->input('password'));
    $user->save();

    $role_user=new Role_user;
    $lastOrder=User::orderBy('id', 'desc')->first();
    $role_user->id_user=$lastOrder->id;
    $role_user->id_role=$request->input('radio');
    $role_user->save();

    return redirect()->route('getAddUserAdmin')->with('alert', "Uspesno ste uneli novi nalog!");
  }
  else {
    $user=User::find($request->input('id'));
    $user->name=$request->input('name');
    $user->email=$request->input('email');
    $user->password=Hash::make($request->input('password'));
    $user->save();

    $userID=auth()->user()->id;
    $roleAdmin=Role::where('name', 'Admin')->first();
    $roleUser=Role_user::where('id_user', $userID)->first();

     return redirect()->route('getAddUserAdmin')->with('alert', "Uspesno ste izmenili nalog!");


  }


    }

    public function editUser(Request $request, $id)
    {
      switch($request->input('button'))
      {
        case 'edit':
        $updateUser=User::where('id', $id)->first();
        $data = array('user' => $updateUser,
        'isNew'=> 0 ,
        'role'=>'Korisnika');
        return view('adminAddUserAdmin')->with($data);


        case 'delete':
          $updateUser=User::where('id', $id)->first();

          if(is_null($user=Order::where('id_user', $updateUser->id)))
          {
          $updateUser->delete();
          return redirect()->route('getUsers')->with('alert'. "Uspesno ste obrisali korisnika");
        }
        else{
          return redirect()->route('getUsers')->with('alert2', "Korisnika je nemoguce obrisati zato sto ima porudzbinu/e");
        }
          }



    }

    public function editAdmin(Request $request, $id)
    {
      switch($request->input('button'))
      {
        case 'delete':
        $updateAdmin=User::where('id', $id)->first();
        if(is_null($user=Order::where('id_user', $updateUser->id)))
        {
        $updateAdmin->delete();
        return redirect()->route('getAdmins')->with('alert', "Uspesno ste obrisali admina");
      }
      else{
        return redirect()->route('getAdmins')->with('alert2', "Admina je nemoguce obrisati zato sto ima porudzbinu/e" );
      }

        case 'edit':
          $updateAdmin=User::where('id', $id)->first();
          $data = array('user' => $updateAdmin,
        'isNew'=> 0 ,
        'role'=>'Admina');


              return view('adminAddUserAdmin')->with($data);
        }
    }

  }
