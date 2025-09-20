<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcademyCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'academy_id',
        'course_id',
        'status',
    ];

    protected $casts = [
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
     * Relación con la academia
     */
    public function academy(): BelongsTo
    {
        return $this->belongsTo(Academy::class);
    }

    /**
     * Relación con el curso
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
