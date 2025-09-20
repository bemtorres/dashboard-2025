<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Academy extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'user_id',
        'code',
        'name',
        'objective',
        'photo',
        'info',
        'status',
        'active',
    ];

    protected $casts = [
        'info' => 'array',
        'status' => 'integer',
        'active' => 'boolean',
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
        return $this->belongsToMany(Course::class, 'academy_courses')
                    ->withPivot(['status'])
                    ->withTimestamps();
    }

    /**
     * Relación directa con la tabla pivot academy_courses
     */
    public function academyCourses(): HasMany
    {
        return $this->hasMany(AcademyCourse::class);
    }
}
