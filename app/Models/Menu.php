<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $fillable = ['name', 'parent_id'];

    public function parentMenu()
    {
        return $this->belongsTo(Menu::class, 'parent_id', 'id');
    }

    public function childMenu()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id');
    }

}
