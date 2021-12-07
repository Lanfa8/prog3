<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Usuario extends Model implements Authenticatable
{
    use HasFactory;
    public function getAuthIdentifierName ()
    {
        return 'id';
    }
    public function getAuthIdentifier ()
    {
        return $this->id;
    }
    public function getAuthPassword ()
    {
        return $this->password;
    }
    public function getRememberToken ()
    {
    }
    public function setRememberToken ($valor)
    {
    }
    public function getRememberTokenName ()
    {
    }
    
    public $timestamps = false;
    
    protected $hidden = [
        'password',
       ];
}
