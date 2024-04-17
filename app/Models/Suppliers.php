<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier_Contacts;

class Suppliers extends Model
{
    protected $table="suppliers";
    protected $guarded = [];

    public function supplierContacts()
    {
          return $this->hasMany(Supplier_Contacts::class,'fk_supplier_id','id');
                   
                
    }
}