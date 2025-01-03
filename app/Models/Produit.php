<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $table = 'produits';
    protected $primarykey = 'id';
    protected $fillable = ['name', 'description' , 'prix' ,'marque','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
