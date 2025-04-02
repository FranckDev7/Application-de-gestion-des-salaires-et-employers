<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    /**
     * Les attributs qui ne peuvent pas être assignés en masse.
     * On laisse le tableau vide pour désactiver la protection.
     *
     * @var array
     */
    protected $guarded = [''];

    /**
     * Définit une relation entre un employé et un département.
     * Un employé appartient à un département.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departement()
    {
        // Un employé appartient à un département
        return $this->belongsTo(Departement::class);
    }
}
