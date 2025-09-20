<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'logo',
        'favicon',
        'email',
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
     * Relación uno a muchos con usuarios
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Relación uno a muchos con cursos
     */
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    /**
     * Relación uno a muchos con módulos
     */
    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }

    /**
     * Relación uno a muchos con academias
     */
    public function academies(): HasMany
    {
        return $this->hasMany(Academy::class);
    }

    /**
     * Relación uno a muchos con tenants asociados (como tenant principal)
     */
    public function tenantsAssociated(): HasMany
    {
        return $this->hasMany(TenantAssociated::class);
    }

    /**
     * Relación uno a muchos con tenants asociados (como tenant asociado)
     */
    public function tenantAssociatedFrom(): HasMany
    {
        return $this->hasMany(TenantAssociated::class, 'tenant_associated_id');
    }
}
