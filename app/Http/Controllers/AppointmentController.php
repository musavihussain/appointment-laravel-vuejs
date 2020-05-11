<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function index() {
        $appointements = Appointment::all();
        return response()->json($appointements);

    }

    // Create new appointment
    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required',
            'mobile' => 'required'
        ]);

        if (!$validator->fails()) {
        $validated_data= $request->all();
        $appointement = new Appointment();
        $appointement->fill($validated_data);
        $appointement->save();
        return $appointement;
       }
      else
       return $validator->errors();
       }

}
