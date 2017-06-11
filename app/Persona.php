<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';

    protected $fillable = ['identificacion', 'nombre', 'apellido', 'celular', 'barrio', 'direccion', 'foto', 'fechanacimiento', 'lugarnacimiento', 'telcasa', 'telcasa2', 'emailadicional'];

    /**
     * Relacion uno a uno con el modelo User
     */
    public function user()
    {
        return $this->hasOne('App\User', 'persona_id');
    }

    /**
     * Funcion que guarda la foto
     */
    public function setFotoAttribute ($foto)
    {
        if($foto != 'img/usuarios/default.png') {
            if (!Empty($foto)) {

                //Creamos una instancia de la libreria Image
                $img = \Image::make($foto);

                //Ruta donde queremos guardar las imagenes
                $path = public_path() . '/img/usuarios/';

                // Cambiar de tamaño a 160px x 160px
                $img->resize(160, 160);

                // Guardarmos
                $nombre = $this->attributes['identificacion'] . $foto->getClientOriginalName();//nuevo nombre de imagen
                $img->save($path . $nombre);

                //Introducimos en el atributo foto el nuevo nombre
                $this->attributes['foto'] = 'img/usuarios/' . $nombre;
            }
        }
        else {
            $this->attributes['foto'] = $foto;
        }
    }

    public function getFullNameAttribute()
    {
        return $this->nombre.' '.$this->apellido;
    }

}
