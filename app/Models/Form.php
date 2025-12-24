<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{   
    use HasFactory;

    protected $fillable=['form_name'];

    public function fields() {
        return $this->hasMany(FormField::class)->orderBy('sort_order');
    }

    public function responses() {
        return $this->hasMany(FormResponse::class);
    }
    public function versions(){
        return $this->hasMany(FormVersion::class);
    }

    public function activeVersion(){
        return $this->hasOne(FormVersion::class)->where('is_active', true);
    }
}
