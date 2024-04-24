<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class kategori extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public function post()
    {
        return $this->hasMany(post::class);
    }

    
    public function getRouteKeyName(){
        //merubah/menampilkan slug sebagai pengganti id
        return'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
   
}
