<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    use HasFactory;

    protected $fillable=['form_id','label','form_version_id','type','required','placeholder','sort_order'];

    public function form(){
        return $this->belongsTo(Form::class);
    }

    public function options(){
        return $this->hasMany(FieldOption::class,'field_id');
    }

    public function responseValues(){
        return $this->hasMany(FormResponseValue::class,'field_id');
    }
    public function version(){
        return $this->belongsTo(FormVersion::class, 'form_version_id');
    }

}
