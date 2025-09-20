<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'user_id',
        'code',
        'name',
        'module_id',
        'type',
        'title',
        'body',
        'info',
        'image',
        'data',
        'position',
    ];

    protected $casts = [
        'info' => 'array',
        'type' => 'integer',
        'position' => 'integer',
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
     * Relación con el módulo
     */
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * Tipos de contenido disponibles
     */
    public static function getContentTypes(): array
    {
        return [
            1 => 'Texto',
            2 => 'Imagen',
            3 => 'Video',
            4 => 'Audio',
            5 => 'Documento',
            6 => 'Enlace',
            7 => 'Quiz',
        ];
    }

    /**
     * Obtener el nombre del tipo de contenido
     */
    public function getTypeNameAttribute(): string
    {
        $types = self::getContentTypes();
        return $types[$this->type] ?? 'Desconocido';
    }
}
