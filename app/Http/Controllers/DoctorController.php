<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = User::doctors()->paginate(10);
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {

        return view('doctors.create');
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
                'role' => 'doctor',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notification = 'El médico se ha registrado correctamente.';
        return redirect('/medicos')->with(compact('notification'));
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $doctor = User::doctors()->findOrFail($id);
        return view('doctors.edit', compact('doctor'));

    }


    public function update(Request $request, $id)
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
        $user = User::doctors()->findOrFail($id);

        $data = $request->only('name', 'email', 'cedula', 'address', 'phone');
        $password = $request->input('password');

        if($password)
            $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();

        $notification = 'La información se ha modificado correctamente.';
        return redirect('/medicos')->with(compact('notification'));
    }


    public function destroy($id)
    {
        $user = User::doctors()->findOrFail($id);
        $doctorName = $user->name;
        $user->delete();

        $notification = "El médico $doctorName se ha eliminado correctamente.";
        return redirect('/medicos')->with(compact('notification'));
    }
}
