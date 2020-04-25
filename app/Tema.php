<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Tema extends Model
{
    use SoftDeletes;
    use SoftCascadeTrait;
    
    protected $dates = ['deleted_at'];
    protected $softCascade = ['articulos'];
    protected $fillable=['nombre','destacado','suscripcion'];
    
    public function getRoutekeyName()
    {
        return 'slug';
    }
    
    
    public function getCreatedAtAttribute($date)
    {
        return new Date($date);
    }
    
   
    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    public function articulos()
    {
        return $this->hasMany(Articulo::class); 
    }

    public function getEsDestacadoAttribute()
    {
        $esDestacado=$this->destacado;
        if($esDestacado)
            return 'Si';
        return 'No';
    }

    public function getEsSuscripcionAttribute()
    {
        $esSuscripcion=$this->suscripcion;
        if($esSuscripcion)
            return 'Si';
        return 'No';
    } 

}
