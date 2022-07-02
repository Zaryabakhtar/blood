<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonnorVisits extends Model
{
    protected $table = 'donnor_visits';
    protected $primaryKey = 'id';

    protected static function primaryKeyName() {
        return (new static)->getKeyName();
    }
}
