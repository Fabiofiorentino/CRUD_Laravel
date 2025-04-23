<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function fornecedores()
    {
        return $this->belongsToMany(Fornecedor::class);
    }
}
