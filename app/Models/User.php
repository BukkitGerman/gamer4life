<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRoles() : array
    {
        $roleModels = [];
        foreach ($this->getRoleNames() as $roleName)
        {
            array_push($roleModels, Role::query()->where('name', $roleName)->first());
        }
        return $roleModels;
    }

    public function getEmailStatusText()
    {
        $this->hasVerifiedEmail() ? $text = __('email_verified') :  $text = __('email_not_verified');
        return $text;
    }

    public function getEmailStatusIcon() : string
    {
        $this->hasVerifiedEmail() ? $iconClasses = 'fas fa-check-circle text-success' :  $iconClasses = 'fas fa-check-circle text-muted';
        return '<i class="' . $iconClasses . '" data-bs-toggle="tooltip" title="' . $this->getEmailStatusText() . '"></i>';
    }
}
