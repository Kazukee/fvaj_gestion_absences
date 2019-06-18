<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'institution_id', 'role', 'titre', 'name', 'telephone', 'adresse', 'date_de_naissance', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function matiere() {
        return $this->hasOne('App\Matiere');
    }

    public function institution() {
        return $this->belongsTo('App\Institution');
    }

    public function eleves() {
        return $this->belongsToMany('App\Eleve', 'eleve_utilisateur')->withPivot('eleve_id', 'user_id');
    }

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function routeNotificationForMail($notification) {
        return $this->email;
    }

    public function routeNotificationForNexmo($notification) {
        return $this->telephone;
    }
}
