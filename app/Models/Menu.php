<?php

namespace App\Models;

use App\Models\Submenu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';

    protected $guarded = ['id'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function submenus()
    {
        return $this->hasMany(Submenu::class);
    }
}
