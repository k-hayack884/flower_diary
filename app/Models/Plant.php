<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Plant extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'plantId',
        'name',
        'scientific',
        'information',
        'recommendSpringWaterInterval',
        'recommendSpringWaterTimes',
        'recommendSummerWaterInterval',
        'recommendSummerWaterTimes',
        'recommendAutumnWaterInterval',
        'recommendAutumnWaterTimes',
        'recommendWinterWaterInterval',
        'recommendWinterWaterTimes',
        'fertilizerName',
        'fertilizerMonths',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasMany
     */
    public function plantUnit()
    {
        return $this->hasMany(PlantUnit::class, 'plant_id');

    }

    /**
     * @return HasMany
     */
    public function plant()
    {
        return $this->hasMany(PlantImage::class, 'plant_id');

    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
