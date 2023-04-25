<?php

namespace App\Models;

use App\Models\User;
use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tache extends Model
{
    use HasFactory;
    protected $fillable=['id','objet','montant','user_id'];

    public function acount(){
        return $this->belongsTo(Account::class);
    }
}
