<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblBloodGroups extends Model
{
    protected $table = 'blood_groups';
    protected $primaryKey = 'blood_group_id';

    protected static function primaryKeyName() {
        return (new static)->getKeyName();
    }
}
