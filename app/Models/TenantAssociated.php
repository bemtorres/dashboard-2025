<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TenantAssociated extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'tenant_associated_id',
    ];

    /**
     * Relación con el tenant principal
     */
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    /**
     * Relación con el tenant asociado
     */
    public function tenantAssociated(): BelongsTo
    {
        return $this->belongsTo(Tenant::class, 'tenant_associated_id');
    }
}
