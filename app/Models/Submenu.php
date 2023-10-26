<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submenu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
