<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    protected $primaryKey = 'AddressID';
    protected $table = 'address';
}
