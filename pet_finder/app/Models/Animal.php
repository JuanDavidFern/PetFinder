<?php

namespace App\Models;

use App\Http\Controllers\AdoptionHitoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'age',
        'type',
        'characteristics',
        'information',
        'photo',
        'current_owner_id',
        "sponsors_count",
    ];

    // Aquí puedes definir relaciones con otros modelos si es necesario

    // Por ejemplo, si un animal pertenece a un usuario (dueño actual)
    public function currentOwner()
    {
        return $this->belongsTo(User::class, 'current_owner_id');
    }

    public function sponsors()
    {
        return $this->belongsToMany(User::class, 'sponsors')->withPivot("status");
    }

}
