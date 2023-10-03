<?php

namespace App\Models;

use App\Models\User;
use App\Models\Offer;
use App\Models\Option;
use App\Models\PropertyImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'area',
        'rooms',
        'bedrooms',
        'floor',
        'price',
        'city',
        'address',
        'zip_code',
        'sold',
    ];

    protected $sortable = [
        'price',
        'created_at',
    ];

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class, 'property_id');
    }

    public function scopeMostRecent(Builder $query): Builder
    {
        return $query->orderByDesc('created_at');
    }

    public function scopeWithoutSold(Builder $query): Builder
    {
        // return $query->doesntHave('offers')
        //     ->orWhereHas(
        //         'offers',
        //         fn (Builder $query) => $query->whereNull('accepted_at')->whereNull('rejected_at')
        //     );
        return $query->where('sold', false);
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query
            ->when(
                $filters['price_from'] ?? false,
                fn ($query, $price_from) => $query->where('price', '>=', $price_from)
            )
            ->when(
                $filters['price_to'] ?? false,
                fn ($query, $price_to) => $query->where('price', '<=', $price_to)
            )
            ->when(
                $filters['bedrooms'] ?? false,
                fn ($query, $bedrooms) => $query->where('bedrooms', (int)$bedrooms < 6 ? '=' : '>=', $bedrooms)
            )
            ->when(
                $filters['rooms'] ?? false,
                fn ($query, $rooms) => $query->where('rooms', (int)$rooms < 6 ? '=' : '>=', $rooms)
            )
            ->when(
                $filters['floor'] ?? false,
                fn ($query, $floor) => $query->where('floor', (int)$floor < 6 ? '=' : '>=', $floor)
            )
            ->when(
                $filters['area_from'] ?? false,
                fn ($query, $area_from) => $query->where('area', '>=', $area_from)
            )
            ->when(
                $filters['area_to'] ?? false,
                fn ($query, $area_to) => $query->where('area', '<=', $area_to)
            )
            ->when(
                $filters['search'] ?? false,
                fn ($query, $search) => $query->where('title', 'like', '%' . $search . '%')
            )
            ->when(
                $filters['deleted'] ?? false,
                fn ($query, $deleted) => $query->withTrashed()
            )
            ->when(
                $filters['by'] ?? false,
                fn ($query, $by) => !in_array($by, $this->sortable) ? $query :
                    $query->orderBy($by, $filters['order'] ?? 'desc')
            );
    }
}
