<?php namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{

    protected $table = "users";

    protected $primaryKey = 'id';

    protected $allowedFields = ['first_name','last_name','email','password','role','b_name','logo','pan','tan','gstin','cin','plan_expires','public_id','apiKey'];

}