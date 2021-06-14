<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    protected  $primaryKey = 'id_departement';

     public function services()
    {
        return $this->hasMany(Service::class, "id_departement", "id_departement");
    }

}
