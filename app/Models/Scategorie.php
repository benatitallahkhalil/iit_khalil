<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scategorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomcategorie',
        'imagecategorie',
        'categorieID'];
        public function categorie(){
            return $this->belongsTo(Categorie::class,'categorieID');

        }
}
