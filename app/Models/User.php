<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'is_admin',
        'photo',
        'tenant_id',
        'active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'active' => 'boolean',
        ];
    }

    /**
     * Get the user's full name.
     */
    public function getFullNameAttribute(): string
    {
        return trim($this->name . ' ' . $this->last_name);
    }

    /**
     * Get the user's initials for avatar.
     */
    public function getInitialsAttribute(): string
    {
        $initials = '';
        if ($this->name) {
            $initials .= strtoupper(substr($this->name, 0, 1));
        }
        if ($this->last_name) {
            $initials .= strtoupper(substr($this->last_name, 0, 1));
        }
        return $initials ?: 'U';
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
     * Relación con el tenant
     */
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
