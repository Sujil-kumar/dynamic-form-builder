<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\FormField;
use App\Models\FieldOption;
use App\Models\FormResponse;
use App\Models\FormVersion;

class AdminController extends Controller
{
    public function index() {
        $forms=Form::latest()->get();
        $activeForm=Form::where('is_active','1')->get();
        $responses=FormResponse::all();
        return view('admin.dashboard',compact('forms','responses','activeForm'));
    }

    public function formCreate() {
        return view('admin.formCreate');
    }

    public function formSave(Request $request) {
        $request->validate([
            'form_name' => 'required|string|max:255',
            'fields'=> 'required|array|min:1',
            'fields.*.label' => 'required|string|max:255',
            'fields.*.type' => 'required|in:text,textarea,number,dropdown,checkbox,radio',
            'fields.*.sort_order' => 'required|integer',
            'fields.*.required' => 'nullable|boolean',
            'fields.*.options' => 'nullable|array|min:2',
            'fields.*.options.*' => 'required|string|max:255',
        ]);

        $form=Form::create(['form_name' => $request->form_name]);
        $version=FormVersion::create(['form_id' => $form->id,'version_number' => 1,'is_active' => true]);

        foreach ($request->fields as $fieldData) {
            $formField=FormField::create([
                'form_id' => $form->id,
                'label' => $fieldData['label'],
                'type' => $fieldData['type'],
                'form_version_id'=>$version->id,
                'required' => $fieldData['required'] ?? 0,
                'placeholder' => $fieldData['placeholder'] ?? null,
                'sort_order' =>$fieldData['sort_order'],
            ]);
            if (in_array($fieldData['type'], ['dropdown','checkbox','radio']) && !empty($fieldData['options'])) {
                foreach ($fieldData['options'] as $option) {
                    FieldOption::create([
                        'field_id' => $formField->id,
                        'option_text' => $option
                    ]);
                }
            }

        }
        return redirect()->route('admin.dashboard')->with('success','Form created successfully');

    }

    public function formResponse($id){
        $form=Form::find($id);
        $responses = FormResponse::with(['values.field'])->where('form_id', $id)->latest()->get();
        return view('admin.formResponse', compact('form', 'responses'));
    }

    public function formStatus(Request $request) {
        $form = Form::find($request->id);
        $form->is_active = $request->is_active;
        $form->save();

        return response()->json(['success'=>true,'message' => 'Status updated successfully']);
    }

    public function editForm($id){
        $form = Form::findOrFail($id);

        $version = $form->versions()
            ->where('is_active', true)
            ->with(['fields.options'])
            ->first();

        if (!$version) {
            return redirect()->back()->with('error', 'No active version found for this form');
        }

        return view('admin.editForm', compact('form', 'version'));
    }

    public function editSave(Request $request)
    {
        $request->validate([
            'form_id' => 'required|exists:forms,id',
            'form_name' => 'required|string|max:255',
            'fields'=> 'required|array|min:1',
            'fields.*.label' => 'required|string|max:255',
            'fields.*.type' => 'required|in:text,textarea,number,dropdown,checkbox,radio',
            'fields.*.sort_order' => 'required|integer',
            'fields.*.required' => 'nullable|boolean',
            'fields.*.options' => 'nullable|array|min:2',
            'fields.*.options.*' => 'required|string|max:255',
        ]);

        $form = Form::find($request->form_id);

        $latestVersion = $form->versions()->latest('version_number')->first();
        $newVersionNumber = $latestVersion ? $latestVersion->version_number + 1 : 1;

        $version = FormVersion::create([
            'form_id'=>$form->id,
            'version_number' => $newVersionNumber,
            'is_active' => true,
        ]);

        foreach ($request->fields as $fieldData) {
            $formField = $version->fields()->create([
                'form_id' => $form->id,
                'label' => $fieldData['label'],
                'type' => $fieldData['type'],
                'required' => $fieldData['required'] ?? 0,
                'placeholder' => $fieldData['placeholder'] ?? null,
                'sort_order' => $fieldData['sort_order'],
            ]);

            if (in_array($fieldData['type'], ['dropdown','checkbox','radio']) && !empty($fieldData['options'])) {
                foreach ($fieldData['options'] as $option) {
                    $formField->options()->create([
                        'option_text' => $option
                    ]);
                }
            }
            }

        FormVersion::where('id','!=',$version->id)->update(['is_active'=>false]);


        $form->update(['form_name' => $request->form_name]);

        return redirect()->route('admin.dashboard')->with('success', 'Form updated successfully. New version created.');
    }
}
