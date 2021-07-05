<?php namespace App\Models;

use CodeIgniter\Model;

class InvoiceModel extends Model
{

    protected $table = "invoices";

    protected $primaryKey = 'id';

    protected $allowedFields = ['public_id','customer_data','payment_data','status','validity','amount','currency','user'];

}