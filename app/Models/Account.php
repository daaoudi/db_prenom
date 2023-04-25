<?php

namespace App\Models;

use App\Models\Tache;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;
    protected $fillable=['id','nom','photo','adresse','ville','Service_id'];

    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function taches(){
        return $this->hasMany(Tache::class);
    }
}
