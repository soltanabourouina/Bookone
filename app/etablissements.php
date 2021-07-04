<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class etablissements extends Model
{
    protected $fillable = [
        'nom',
        'code',
        'departement_id',
       
    ];

   public function departement()
   {
   return $this->belongsTo('App\departements');
   }
}
