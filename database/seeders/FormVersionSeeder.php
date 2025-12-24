<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Form;
use App\Models\FormVersion;
use App\Models\FormField;
use App\Models\FormResponse;

class FormVersionSeeder extends Seeder
{
    public function run()
    {
        foreach (Form::all() as $form) {

            $version = FormVersion::create([
                'form_id' => $form->id,
                'version_number' => 1,
                'is_active' => true
            ]);

            FormField::where('form_id', $form->id)
                ->update(['form_version_id' => $version->id]);

            FormResponse::where('form_id', $form->id)
                ->update(['form_version_id' => $version->id]);
        }
    }
}
