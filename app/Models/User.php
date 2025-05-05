<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\SendVerifyWithQueueNotification;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasApiTokens;

    protected $table = 'users';
    protected $guarded = false;

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    static function getGenders(): array
    {
         return [
             self::GENDER_MALE => 'Мужской',
             self::GENDER_FEMALE => 'Женский',
         ];
    }

    public function getGenderTitleAttribute(): string
    {
        return self::getGenders()[$this->gender];
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function mainAddress(): HasOne
    {
        return $this->hasOne(Address::class)->where('is_main', 1);
    }

    public function hasRole($role): bool
    {
        return $this->role->title === $role;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new SendVerifyWithQueueNotification());
    }

    public function hasPermission($permission): bool
    {
        if ($this->role->permissions->pluck('title')->contains($permission)) {
            return true;
        } else {
        return false;
        }
    }
}
