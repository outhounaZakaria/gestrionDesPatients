<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    protected  $primaryKey = 'id_medecin';

    use HasFactory;

      public function consultations()
    {
        return $this->hasMany(Consultation::class, "id_medecin", "id_medecin");
    }
}
