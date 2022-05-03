<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Hasone;

class Persons extends Model
{
    use HasFactory;
    protected $table = "tbl_persons";

    public function profile(): Hasone{
        return $this->hasOne(ProfilePersons::class, 'person_id');
    }
    
}
