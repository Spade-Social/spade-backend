<?php

namespace App\Models;

use App\Notifications\SendVerificationCode;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_code', 'phone_number', 'country', 'state', 'city', 'postal_code',
        'religion', 'birthday', 'gender', 'interest', 'height', 'build', 'build_interest', 'verification_code', 'email_verified_at',
        'relationship_personality', 'ethnicity', 'preferred_ethnicity', 'preferred_religion', 'personality_score', 'api_token',
        'preferred_gender', 'most_free', 'drink', 'smoke', 'children', 'highest_education'
    ];

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
        'relationship_personality' => 'array'
    ];

    /**
     * Get the inspection availabilities for user
     */
    public function funPlaces()
    {
        return $this->hasMany(UserFunPlace::class);
    }

    public function sendVerificationCode(){
        $verification_code = mt_rand(1111,9999);
        $this->update(['verification_code' => $verification_code]);
        $this->notify(new SendVerificationCode());
    }
}
