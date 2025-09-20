<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
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
        'total_content',
        'total_time',
        'status',
        'active',
    ];

    protected $casts = [
        'info' => 'array',
        'total_content' => 'integer',
        'total_time' => 'integer',
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
     * Relación muchos a muchos con módulos
     */
    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(Module::class, 'course_modules')
                    ->withPivot(['position', 'status'])
                    ->withTimestamps();
    }

    /**
     * Relación muchos a muchos con academias
     */
    public function academies(): BelongsToMany
    {
        return $this->belongsToMany(Academy::class, 'academy_courses')
                    ->withPivot(['status'])
                    ->withTimestamps();
    }

    /**
     * Relación directa con la tabla pivot course_modules
     */
    public function courseModules(): HasMany
    {
        return $this->hasMany(CourseModule::class);
    }

    /**
     * Relación directa con la tabla pivot academy_courses
     */
    public function academyCourses(): HasMany
    {
        return $this->hasMany(AcademyCourse::class);
    }
}
