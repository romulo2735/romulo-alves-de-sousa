<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserType;
use App\Models\Traits\Filterable;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as Audit;

/**
 * @class User
 * @property integer id
 * @property string name
 * @property string email
 * @property string password
 * @property string type
 */
class User extends Authenticatable implements Auditable
{
    /** @use HasFactory<UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    use Audit;
    use Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
    ];


    protected $casts = [
        'type' => UserType::class,
    ];

    public function filterByName($query, $value)
    {
        $query->where('name', 'like', "%$value%");
    }

    public function filterByEmail($query, $value)
    {
        $query->where('email', 'like', "%$value%");
    }

    public function filterByType($query, $value)
    {
        $query->where('name', 'like', "%{$value}%");
    }

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
        ];
    }

    public function candidate(): HasOne
    {
        return $this->hasOne(Candidate::class);
    }

    public function vacancy(): HasMany
    {
        return $this->HasMany(Vacancy::class);
    }
}
