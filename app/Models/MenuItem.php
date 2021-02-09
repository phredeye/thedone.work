<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Kalnoy\Nestedset\NodeTrait;

class MenuItem extends Model
{
    use HasFactory;
    use NodeTrait;

    protected $fillable = ['label', 'key','url'];

    public function menu() : BelongsTo {
        return $this->belongsTo(Menu::class);
    }
}
