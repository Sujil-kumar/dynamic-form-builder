<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormVersion extends Model
{
    use HasFactory;

    protected $fillable = ['form_id', 'version_number', 'is_active'];

    public function fields()
    {
        return $this->hasMany(FormField::class, 'form_version_id');
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
