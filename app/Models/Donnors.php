<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donnors extends Model
{
    protected $table = 'donnors';
    protected $primaryKey = 'donnor_id';

    protected static function primaryKeyName() {
        return (new static)->getKeyName();
    }

    public function blood_group(){
        return $this->belongsTo(TblBloodGroups::class , 'blood_group_id');
    }
}
