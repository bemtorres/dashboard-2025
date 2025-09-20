<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'user_id',
        'code',
        'name',
        'info',
        'objective',
        'items_total',
        'status',
    ];

    protected $casts = [
        'info' => 'array',
        'items_total' => 'integer',
        'status' => 'integer',
    ];

    /**
     * Relación con el tenant
     */
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    /**
     * Relación con el usuario creador
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación muchos a muchos con cursos
     */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_modules')
                    ->withPivot(['position', 'status'])
                    ->withTimestamps();
    }

    /**
     * Relación uno a muchos con contenidos
     */
    public function contents(): HasMany
    {
        return $this->hasMany(Content::class);
    }

    /**
     * Relación directa con la tabla pivot course_modules
     */
    public function courseModules(): HasMany
    {
        return $this->hasMany(CourseModule::class);
    }
}
