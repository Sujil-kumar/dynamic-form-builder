<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\FormOption;
use App\Models\FormResponse;
use App\Models\FormResponseValue;
use App\Models\FormVersion;

class UserController extends Controller
{
    public function index(){
        $forms=Form::where('is_active','1')->latest()->get();
        return view('user.dashboard',compact('forms'));
    }

    public function formFill($id){
        $form = Form::findOrFail($id);

        $version = $form->versions()
            ->where('is_active', true)
            ->with(['fields.options'])
            ->first();

        if (!$version) {
            abort(404, 'No active form version found.');
        }

        return view('user.formFill', compact('form', 'version'));
    }

    public function formSubmit(Request $request){
        $request->validate([
            'form_id' => 'required|exists:forms,id',
            'responses' => 'required|array'
        ]);

        $response=FormResponse::create(['form_id'=>$request->form_id,'form_version_id'=>$request->version_id]);

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
