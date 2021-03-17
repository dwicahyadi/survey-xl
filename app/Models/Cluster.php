<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $hidden = ["created_at", "updated_at"];


    public function outlets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Outlet::class);
    }

    public function micro_clusters(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MicroCluster::class);
    }
}
