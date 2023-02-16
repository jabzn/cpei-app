<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Farm extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'owner',
        'type_livestock', 
        'regional',
        'subregional',
    ];

    /**
     * Get the user that owns the farm.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Scope
    public function scopeGetFarms($query, $request)
    {
        return $query->with('user')
            ->search($request)
            ->isPpl()
            ->latest()
            ->paginate(8);
    }

    public function scopeIsPpl($query)
    {
        return $query->when(Auth()->user()->role == 'ts/ppl', function ($query) {
            return $query->where('user_id', Auth()->id());
        });
    }

    public function scopeSearch($query, $request)
    {
        return $query->when($request, function ($query, $search) {
            return $query->where('name', 'like', '%'.$search.'%');
        });
    }
}
