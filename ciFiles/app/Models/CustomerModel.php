<?php namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{

    protected $table = "customers";

    protected $primaryKey = 'id';

    protected $allowedFields = ['first_name','last_name','email','bname','gstin','city','state','country','mobile_number','user','public_id'];

}