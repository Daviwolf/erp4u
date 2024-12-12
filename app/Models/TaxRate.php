<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxRate extends Model {
    use HasFactory;

    protected $table = 'tax_rates';

    protected $fillable = [
        'taxRateCode',
        'descriptionTaxRate',
        'taxRate',
        'created_by',
        'updated_by',
    ];
    
}
