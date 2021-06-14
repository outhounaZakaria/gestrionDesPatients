<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected  $primaryKey = 'id_service';

      public function medecins()
    {
        return $this->hasMany(Medecin::class, "id_service", "id_service");
    }

}
