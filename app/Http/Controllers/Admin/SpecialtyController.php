<?php

namespace App\Http\Controllers\Admin;

use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialtyController extends Controller
{

    public function index()
    {
        $specialties = Specialty::all(); // SELECT * FROM specialties
        return view('specialties.index', compact('specialties'));
    }

    public function create()
    {
        return view('specialties.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para la especialidad.',
            'name.min' => 'El nombre de la especialidad debe tener al menos 3 caracteres.'
        ];
        $this->validate($request, $rules, $messages);

        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save(); // INSERT

        $notification = 'La especialidad se ha registrado correctamente.';

        return redirect('/especialidades')->with(compact('notification'));
    }

    public function edit(Specialty $specialty){
        return view('specialties.edit', compact('specialty'));
    }

    public function update(Request $request, Specialty $specialty){
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para la especialidad.',
            'name.min' => 'El nombre de la especialidad debe tener al menos 3 caracteres.'
        ];
        $this->validate($request, $rules, $messages);

        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save(); // UPDATE

        $notification = 'La especialidad se ha actualizado correctamente.';

        return redirect('/especialidades')->with(compact('notification'));
    }

    public function destroy(Specialty $specialty){
        $specialtyName = $specialty->name;
        $specialty->delete(); // DELETE

        $notification = "La especialidad $specialtyName se ha eliminado correctamente.";

        return redirect('/especialidades')->with(compact('notification'));
    }
}
