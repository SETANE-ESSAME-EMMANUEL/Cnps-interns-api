<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
class Admin extends  Authenticatable
{
    use HasFactory,HasApiTokens,Notifiable;
    protected $fillable=[
    'Admin_Id',
    'Admin_Name',
    'Admin_Surname',
    'Admin_Phone',
    'Admin_Email',
    'Admin_Type',
    'Admin_Password',
];
}
