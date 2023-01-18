<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function edit()
    {
        return view('horario');
    }

    public function store(Request $request)
    {
        $rules = [
            'address' => 'required',
            'phone' => 'required',
            'dni' => 'required',
            'password' => 'required',
        ];

        $messages = [
            'address.required' => 'Es necesario ingresar una dirección',
            'phone.required' => 'Es necesario ingresar un teléfono',
            'dni.required' => 'Es necesario ingresar un DNI',
            'password.required' => 'Es necesario ingresar una contraseña',
        ];

        $this->validate($request, $rules, $messages);

        $notification = 'Tu horario se ha registrado correctamente.';
        return redirect('/horario')->with(compact('notification'));
    }

}
