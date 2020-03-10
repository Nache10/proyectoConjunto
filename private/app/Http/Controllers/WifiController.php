<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Caca;
use App\Conexion;
use App\Activo;
use App\Puntoacceso;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class WifiController extends Controller
{
    
    //  METODOS BASICOS ***********************************************************

    public function inicio(){
        return view('inicio');
    }
    
    public function logout(Request $request){
        
        if(Auth::check()){
            Auth::logout();
            $request->session()->put('alerta','si');
            $request->session()->put('status','primary');
            $request->session()->put('mensaje','Success loging out');
        }
        return redirect('/');
    }
    
    public function admin(){
        return view('admin');
    }
    
    public function resetpassword(Request $request){
        
        $corredo = $request->input('email');
        
        $users = User::all();
        
        foreach($users as $user){
            if($user->email === $corredo){
                
                $user->password = Hash::make('12345');
                try{
                    $user->save();
                }catch(\Exception $e){
                    
                }
                $destinatario = $corredo;
                $correo = new \App\Mail\resetMail($corredo);
                \Mail::to($destinatario)->send($correo);
                $request->session()->put('alerta','si');
                $request->session()->put('status','success');
                $request->session()->put('mensaje','New password is set. Check your email for more information.');
                return redirect('/');

            }
        }
            $request->session()->put('alerta','si');
            $request->session()->put('status','danger');
            $request->session()->put('mensaje',$corredo.' is not in our database');
        
        
        return redirect('/');
    }
    
    public function changepassword(Request $request){
        $pass = $request->input('newpassword');
        $oldpass = $request->input('password');
        $oldpass2 = $request->input('password_confirmation');
        $userid = $request->input('userid');
        $user = User::find($userid);
        if($oldpass === $oldpass2 && Hash::check($oldpass, Auth::user()->password)){
            $user->password = Hash::make($pass);
            try{
                $user->save();
                $request->session()->put('alerta','si');
                $request->session()->put('status','success');
                $request->session()->put('mensaje','New password is set.');
            }catch(\Exception $e){
                
            }
        }else{
            $request->session()->put('alerta','si');
            $request->session()->put('status','danger');
            $request->session()->put('mensaje','Error setting new password');
            return redirect('/');

        }
        Auth::logout();
        return redirect('/');
    }
    public function ranking(){
        $conexiones = \DB::select('Select mac, count(*) as count from conexion group by mac order by count desc limit 5');
        $datos = [
            'conexiones' => $conexiones,
            ];
        return view('ranking')->with($datos);
    }
    
    // FIN METODOS BASICOS ***********************************************************
    //  METODOS PARA USERS ********************************************************
    
    public function users(){
        $users = User::paginate(7);
        $datos = [
            'users' => $users,
            // 'alerta' => Session::get('alerta'),   Cambiar en todas las vistas
            ];
        

        return view('crud.users')->with($datos);
        
    }
    
    public function createusers(){
        
        return view('crud.createuser');
    }
    public function realcreateusers(Request $request){
        $pass1 = $request->input('password');
        $pass2 = $request->input('password-confirm');
        if($pass1 == $pass2){
            try{
                $user = User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'username' => $request->input('username'),
                    'password' => Hash::make($request->input('password'))
                ]);
                $request->session()->put('alerta','si');
                $request->session()->put('status','success');
                $request->session()->put('mensaje','New user set correctly');
            } catch(\Exception $e){
                $request->session()->put('alerta','si');
                $request->session()->put('status','danger');
                $request->session()->put('mensaje','Error setting new user');
            }
            return redirect('admin/users');
        }else{
            $request->session()->put('alerta','si');
            $request->session()->put('status','danger');
            $request->session()->put('mensaje','Both passwords dont match');
            return back();
        }
    }
    
    public function editusers(Request $request, $id){
        $user = User::find($id);
        $datos = [
            'user' => $user,
            ];
        return view('crud.editusers')->with($datos);
    }
    
    public function uploadusers(Request $request, $id){

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        try{
            $user->save();
            $request->session()->put('alerta','si');
            $request->session()->put('status','success');
            $request->session()->put('mensaje','User edited correctly');
        } catch(\Exception $e) {
            $request->session()->put('alerta','si');
            $request->session()->put('status','warning');
            $request->session()->put('mensaje','Error editing user');
        }
        return redirect('admin/users');
    }
    
    public function deleteusers(Request $request, $id){
        
        $user = User::find($id);
        try{
            $user->delete();
            $request->session()->put('alerta','si');
            $request->session()->put('status','success');
            $request->session()->put('mensaje','User deleted correctly');
        } catch(\Exception $e){
            $request->session()->put('alerta','si');
            $request->session()->put('status','warning');
            $request->session()->put('mensaje','Error deleting user');
        }
        
        return redirect()->back();
    }
    
    //  FIN METODOS PARA USERS ********************************************************
    
    //  METODOS PARA ACCESS ***********************************************************
    public function access(){
        $accesspoints = Puntoacceso::paginate(10);
        $datos=[
            'accesspoints'=>$accesspoints,
            ];
        return view('crud.access')->with($datos);
    }
    public function accesscreate(){
        return view('crud.createaccess');
    }
    public function realaccesscreate(Request $request){
        $paceso  = new Puntoacceso($request->all());
        try{
            $paceso->save();
            $request->session()->put('alerta','si');
            $request->session()->put('status','success');
            $request->session()->put('mensaje','Access Point set correctly');
        } catch(\Exception $e){
            $request->session()->put('alerta','si');
            $request->session()->put('status','warning');
            $request->session()->put('mensaje','Error setting access point');
        }
        return redirect('admin/access');
    }
    public function editaccess($id){
        $pa = Puntoacceso::find($id);
        $datos = [
            'pa' => $pa,
            ];
        return view('crud.editaccess')->with($datos);
    }
    public function uploadaccess(Request $request, $id){
        $pa = Puntoacceso::find($id);
        $pa->modelo = $request->input('modelo');
        $pa->ubicacion = $request->input('ubicacion');
        $pa->latitud = $request->input('latitud');
        $pa->longitud = $request->input('longitud');
        $pa->fechaalta = $request->input('fechaalta');
        try{
            $pa->save();
            $request->session()->put('alerta','si');
            $request->session()->put('status','success');
            $request->session()->put('mensaje','Access Point edited correctly');
        } catch(\Exception $e) {
            $request->session()->put('alerta','si');
            $request->session()->put('status','warning');
            $request->session()->put('mensaje','Error editing Access Point');
        }
        return redirect('admin/access');
    }
    public function deleteaccess(Request $request, $id){
        $pa = Puntoacceso::find($id);
        try{
            $pa->delete();
            $request->session()->put('alerta','si');
            $request->session()->put('status','success');
            $request->session()->put('mensaje','Access Point deleted correctly');
        } catch(\Exception $e){
            $request->session()->put('alerta','si');
            $request->session()->put('status','warning');
            $request->session()->put('mensaje','Error deleting access point');
        }
        return redirect('admin/access');
    }
    //  FIN METODOS PARA ACCESS ***********************************************************
    //  METODOS PARA ACTIVE ***********************************************************

    public function active(){
        $actives = Activo::paginate(10);
        $datos = [
            'actives' => $actives
            ];
        
        return view('crud.active')->with($datos);
    }
    public function activecreate (){
        return view('crud.createactive');
    }
    public function realactivecreate(Request $request){
        $activo = new Activo($request->all());
        try{
            $activo->save();
            $request->session()->put('alerta','si');
            $request->session()->put('status','success');
            $request->session()->put('mensaje','Active Timeline created correctly');
        } catch(\Exception $e){
            $request->session()->put('alerta','si');
            $request->session()->put('status','warning');
            $request->session()->put('mensaje','Error creating Active Timeline');
        }
        return redirect('admin/active');
    }
    public function editactive($id){
        $active = Activo::find($id);
        $datos = [
            'active' => $active,
            ];
        return view('crud.editactive')->with($datos);
    }
    public function uploadactive(Request $request, $id){
        $active = Activo::find($id);
        $active->fechainicial = $request->input('fechainicial');
        $active->fechafinal = $request->input('fechafinal');
        $active->horainicial = $request->input('horainicial');
        $active->horafinal = $request->input('horafinal');
        $active->periodominimo = $request->input('periodominimo');
        $active->comentario = $request->input('comentario');
        try{
            $active->save();
            $request->session()->put('alerta','si');
            $request->session()->put('status','success');
            $request->session()->put('mensaje','Active timeline edited correctly');
        } catch(\Exception $e) {
            $request->session()->put('alerta','si');
            $request->session()->put('status','warning');
            $request->session()->put('mensaje','Error editing Active Timeline');
        }
        return redirect('admin/active');
    }
    
    public function deleteactive(Request $request, $id){
        $active = Activo::find($id);
        try{
            $active->delete();
            $request->session()->put('alerta','si');
            $request->session()->put('status','success');
            $request->session()->put('mensaje','Active timeline deleted correctly');
        } catch(\Exception $e) {
            $request->session()->put('alerta','si');
            $request->session()->put('status','warning');
            $request->session()->put('mensaje','Error deleting Active Timeline');
        }
        return redirect('admin/active');
    }
    
    
    //  FIN METODOS PARA ACTIVE ***********************************************************
    //  METODOS PARA CONNECTION ***********************************************************

    public function connection(Request $request){
        $order = $request->input('order');
        if($order){
            // $connections = \DB::table('conexion')->orderBy($order, 'asc')->paginate(10);
            $connections = Conexion::orderBy($order, 'asc')->paginate(10);

        }else{
            $connections = Conexion::paginate(10);
        }
        $datos = [
            'connections' => $connections
            ];
        return view('crud.connection')->with($datos);
        
    }
    public function deleteconnection(Request $request, $id){
        $connection = Conexion::find($id);
        $caca = new Caca();
        $caca->idpuntoacceso = $connection->idpuntoacceso;
        $caca->fecha = $connection->fecha;
        $caca->hora = $connection->hora;
        $caca->mac = $connection->mac;
        try{
            $connection->delete();
            $caca->save();
            $request->session()->put('alerta','si');
            $request->session()->put('status','success');
            $request->session()->put('mensaje','This connection never existed');
        } catch(\Exception $e){
            $request->session()->put('alerta','si');
            $request->session()->put('status','warning');
            $request->session()->put('mensaje','Error deleting bigdata');
        }
        
        return redirect()->back();
    }
    
    public function bigdata(){
        $cacas = Caca::paginate(10);
        $datos = [
            'cacas' => $cacas
            ];
        return view('crud.bigdata')->with($datos);
    }
    public function deletebigdata(Request $request, $id){
        $caca = Caca::find($id);
        try{
            $caca->delete();
            $request->session()->put('alerta','si');
            $request->session()->put('status','success');
            $request->session()->put('mensaje','I will pretend I have not seen it');
        } catch(\Exception $e){
            $request->session()->put('alerta','si');
            $request->session()->put('status','warning');
            $request->session()->put('mensaje','Error deleting bigdata');
        }
        
        return redirect()->back();
    }
    
    // FIN METODOS PARA CONNECTION ***********************************************************
    // INICIO METODOS PARA GRAPHS ************************************************************
    
    public function graphs(){
        $puntos = Puntoacceso::all();
        $datos=[
            'puntos'=>$puntos
            ];
        return view('crud.graphs')->with($datos);
    }
}
