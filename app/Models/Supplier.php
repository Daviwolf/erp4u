<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $fillable = ['code', 'name', 'address1', 'address2', 'town', 'postalCode', 'status', 'created_by', 'updated_by', 'nif'];    

    public function postalCodeLink(){
        return $this->belongsTO(PostalCode::class, 'postalCode', 'postalCode');
    }
    
}
