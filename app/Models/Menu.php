<?php

namespace App\Models;

use App\Models\Submenu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function roles()
    {
        return $this->belongsTo(Role::class, 'users_role');
    }

    public function submenus()
    {
        return $this->hasMany(Submenu::class);
    }
}
