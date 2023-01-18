<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function index()
    {
        $patients = User::patients()->paginate(10);
        return view('patients.index', compact('patients'));
    }

    public function create()
    {

        return view('patients.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name'     => 'required|min:3',
            'email'    => 'required|email',
            'cedula'      => 'required|digits:8',
            'address'  => 'nullable|min:6',
            'phone'    => 'required',
        ];
        $messages = [
            'name.required'   => 'Es necesario ingresar un nombre',
            'name.min'        => 'El nombre debe tener al menos 3 caracteres',
            'email.required'  => 'Es necesario ingresar un correo',
            'email.email'     => 'El correo no es válido',
            'cedula.required' => 'Es necesario ingresar un DNI',
            'cedula.digits'   => 'El DNI debe tener 8 caracteres',
            'address.min'     => 'La dirección debe tener al menos 6 caracteres',
            'phone.min'       => 'El número de teléfono es obligatorio',
        ];

        $this->validate($request,$rules, $messages);
        User::create(
            $request->only('name', 'email', 'cedula', 'address', 'phone')
            + [
                'role' => 'patient',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notification = 'El paciente se ha registrado correctamente.';
        return redirect('/pacientes')->with(compact('notification'));


    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $patient = User::patients()->findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name'     => 'required|min:3',
            'email'    => 'required|email',
            'cedula'   => 'required|digits:8',
            'address'  => 'nullable|min:6',
            'phone'    => 'required',
        ];
        $messages = [
            'name.required'   => 'Es necesario ingresar un nombre',
            'name.min'        => 'El nombre debe tener al menos 3 caracteres',
            'email.required'  => 'Es necesario ingresar un correo',
            'email.email'     => 'El correo no es válido',
            'cedula.required' => 'Es necesario ingresar un DNI',
            'cedula.digits'   => 'El DNI debe tener 8 caracteres',
            'address.min'     => 'La dirección debe tener al menos 6 caracteres',
            'phone.min'       => 'El número de teléfono es obligatorio',
        ];

        $this->validate($request,$rules, $messages);
        $user = User::patients()->findOrFail($id);

        $data = $request->only('name', 'email', 'cedula', 'address', 'phone');
        $password = $request->input('password');

        if($password)
            $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();

        $notification = 'La información se ha modificado correctamente.';
        return redirect('/pacientes')->with(compact('notification'));
    }


    public function destroy($id)
    {
        $user = User::patients()->findOrFail($id);
        $pacienteName = $user->name;
        $user->delete();

        $notification = "El paciente $pacienteName se ha eliminado correctamente.";
        return redirect('/pacientes')->with(compact('notification'));
    }
}
