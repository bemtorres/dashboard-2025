<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseModule extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'module_id',
        'position',
        'status',
    ];

    protected $casts = [
        'position' => 'integer',
        'status' => 'integer',
    ];

    /**
     * Relación con el curso
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Relación con el módulo
     */
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}
