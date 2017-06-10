<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    // se cambia el comportamiento del modelo, los campos que si se pueden rellenar,eliminar y modificar
    protected $fillable = 
    [
       'name',
       'frequency'
    ];
    
    // base: name ,  title_autor
    // funcion: Name , TitleAutor
    public function setNameAttribute($value){
        $this->attributes['name'] = strtolower($value);    
    }
}
