<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormResponseValue extends Model
{
    use HasFactory;

    protected $fillable=['response_id','field_id','value'];

    public function response(){
        return $this->belongsTo(FormResponse::class,'response_id');
    }

    public function field(){
        return $this->belongsTo(FormField::class,'field_id');
    }
}
