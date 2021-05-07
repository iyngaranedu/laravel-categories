<?php


namespace Iyngaran\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'categories';

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parentWithChildCategories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function childCategories(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id')
            ->orderBy('display_order')
            ->with('categories');
    }
}
