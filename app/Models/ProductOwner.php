<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOwner extends Model
{
    use HasFactory;

    protected $primaryKey = 'po_id';


    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
