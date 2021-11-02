<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Empresa;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        $message = [
            'required' => 'El campo :attribute es obligatorio',
        ];
        $validate = $request->validate($rules,$message);

        if($request->remember){
            $remember = true;
        } else {
            $remember = false;
        }

        if (Auth::attempt($credentials,$remember)) {
            // Authentication passed...
            $request->session()->regenerate();
            if (Auth::user()->admin == 1) {
                return redirect('/dashboard');
            }else{
                return redirect('/');
            }
        } else {
            $errors = (['password' => ['El usuario o la contraseña son inválidos.']]);

            return back()->withErrors($errors);
        }
    }

    public function logOut(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('admin',1)->get();
        return view('usuarios.listar',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all();
        return view('usuarios.crear',compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // VALIDACION
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'empresa_id'=> 'required'
        ];
        $message = [
            'required'=>'El campo es obligatorio',
            'email'=>'Debe ingresarse una dirección de correo correcta',
        ];
        $request->validate($rules,$message);

        //NUEVO USUARIO
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->empresa_id = $request->empresa_id;
        $user->admin = 1;
        $user->save();

        //PERMISOS
        $user->permisos()->create($request->all());
        return redirect()->route('usuarios.index')->with('msj','Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $empresas = Empresa::all();
        
        return view('usuarios.modificar',compact('user','empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // VALIDACION
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'empresa_id'=> 'required'
        ];
        $message = [
            'required'=>'El campo es obligatorio',
            'email'=>'Debe ingresarse una dirección de correo correcta',
        ];
        $request->validate($rules,$message);
        $user = User::findOrFail($id);
        // dd($request->all());
        if ($request->password == null) {
            $user->update($request->except('password'));
            $user->permisos()->update($request->except('password','_token','name','email','empresa_id','_method'));
        }else{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->empresa_id = $request->empresa_id;
            $user->admin = 1;
            $user->save();
            $user->permisos()->update($request->except('password','_token','name','email','empresa_id','_method'));
        }
        
        return redirect()->route('usuarios.index')->with('msj','Usuario modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->admin == 1) {
            $user->permisos()->delete();
            $user->delete();
            return redirect()->route('usuarios.index')->with('msj','Usuario borrado correctamente');
        }else{
            return redirect()->route('usuarios.index')->with('error','No se puede eliminar este usuario');
        }
    }
}
