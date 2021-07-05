<?php namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{

    protected $table = "orders";

    protected $primaryKey = 'id';

    protected $allowedFields = ['public_id','customer_data','payment_data','status','merchant_redirect_url','amount','currency','user'];

}