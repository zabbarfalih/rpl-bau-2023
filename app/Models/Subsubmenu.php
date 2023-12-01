<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subsubmenu extends Model
{
    use HasFactory;

    protected $table = 'subsubmenu';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function submenu()
    {
        return $this->belongsTo(Menu::class);
    }
}
