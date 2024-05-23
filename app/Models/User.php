<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Gate;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
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
    ];

    public function isEmployee()
    {
        return $this->role === 'employee';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // public function roles()
    // {
    // return $this->belongsToMany(Role::class);
    // }

    // public function hasRole($role)
    // {
    // return $this->roles()->where('name', $role)->exists();
    // }

    // public function employee()
    // {
    //     return $this->hasOne(Employee::class);
    // }

    // public function hasAnyRole($roles)
    // {
    //     $userRoles = $this->roles->pluck('name')->toArray();
    //     return !empty(array_intersect($this->roles, $roles));
    // }

}
