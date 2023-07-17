<?php

namespace Progresivjose\LaravelPianoOauth\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class PianoUser extends Model implements Authenticatable
{
    protected $fillable = ['uid', 'first_name', 'last_name', 'personal_name', 'email'];

    protected $primaryKey = 'uid';

    public $incrementing = false;

    public function getAuthIdentifier()
    {
        return $this->uid;
    }

    public function getAuthIdentifierName()
    {
        return 'uid';
    }

    public function getAuthPassword()
    {
        return null;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;

        $this->save();
    }
}
