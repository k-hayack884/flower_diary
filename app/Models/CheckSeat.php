<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class CheckSeat extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $primaryKey = 'check_seat_id';
    protected $keyType = 'string'; // 主キーの型を文字列に設定
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'check_seat_id',
        'plant_unit_id'
    ];

    /**
     * @return BelongsTo
     */
    public function plantUnit()
    {
        return $this->belongsTo(PlantUnit::class,'plant_unit_id');
    }

    /**
     * @return HasMany
     */
    public function fertilizerSetting()
    {
        return $this->hasMany(FertilizerSetting::class,"check_seat_id");
    }

    /**
     * @return HasMany
     */
    public function waterSetting()
    {
        return $this->hasMany(WaterSetting::class,"check_seat_id");
    }

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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
