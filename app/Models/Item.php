<?php

namespace App\Models;

use Dogovor24\Authorization\Services\AuthUserService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'description',
      'type',
      'category',
      'location',
      'date',
      'user_id',
    ];

    protected static function boot()
    {
        parent::boot();

        self::creating(function (Item $item): void {
            if ($userId = auth()->user()->getAuthIdentifier()) {
                $item->user_id = $userId;
            }
        });
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
