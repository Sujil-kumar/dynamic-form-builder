<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\FormOption;
use App\Models\FormResponse;
use App\Models\FormResponseValue;

class UserController extends Controller
{
    public function index(){
        $forms=Form::where('is_active','1')->latest()->get();
        return view('user.dashboard',compact('forms'));
    }

    public function formFill($id){
        $form=Form::with(['fields.options'])->find($id);
        return view('user.formFill',compact('form'));
    }

    public function formSubmit(Request $request){
        $request->validate([
            'form_id' => 'required|exists:forms,id',
            'responses' => 'required|array'
        ]);

        $response=FormResponse::create(['form_id'=>$request->form_id]);

        foreach ($request->responses as $field_id => $value) {

            if (is_array($value)) {
                $value = implode(', ', $value);
            }

            $responseValue=FormResponseValue::create([
            'response_id' => $response->id,
            'field_id' => $field_id,
            'value' => $value
            ]);
        }

        return redirect()->route('user.dashboard')->with('success', 'Form submitted successfully!');
    }
}
