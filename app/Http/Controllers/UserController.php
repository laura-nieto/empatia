<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Empresa;
use App\Models\MensajesEmail;

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
        $empresa = $user->empresas->nombre;
        $font = "'lucida sans unicode', 'lucida grande', sans-serif";
        $msj = new MensajesEmail;
        if ($request->has('clima')) {
            $msj->clima = '<p style="text-align:justify;Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:'.$font.';line-height:21px;color:#333333;font-size:14px">Como parte del proceso denominado <strong>Clima Laboral</strong>, la empresa <strong>'.$empresa.'</strong> le invita a realizar la siguiente encuesta. Favor de desarrollarla de acuerdo a las indicaciones que se le den. Haga click en el enlace para empezar.</p>';
        }
        if ($request->has('desempenio')) {
            $msj->desempenio = '<p style="text-align:justify;Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:'.$font.';line-height:21px;color:#333333;font-size:14px">Como parte del proceso denominado <strong>Desempeño 360°</strong>, la empresa <strong>'.$empresa.'</strong> le invita a realizar la siguiente encuesta. Favor de desarrollarla de acuerdo a las indicaciones que se le den. Haga click en el enlace para empezar.</p>';
        }
        if ($request->has('kenstel')||$request->has('moss')||$request->has('barsit')||$request->has('kostick')||$request->has('valanti')||$request->has('wonderlick')||$request->has('bfq')||$request->has('disc')||$request->has('asertividad')||$request->has('liderazgo')||$request->has('estres')||$request->has('ice')) {
            $msj->automatizacion = '<p style="text-align:justify;Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:'.$font.';line-height:21px;color:#333333;font-size:14px">La empresa <strong>'.$empresa.'</strong> nos encomienda la labor de ponderar sus competencias profesionales, para cumplir dicho fin es que a continuación le presentamos una serie de pruebas psicotécnicas elegidas minuciosamente, las cuales usted tendrá que desarrollar de acuerdo a las indicaciones que se le vayan dando. Haga click en el enlace para empezar.</p>';
        }
        $msj->empresa_id = $request->empresa_id;
        $msj->save();

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
