<?php namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{

    protected $table = "transactions";

    protected $primaryKey = 'id';

    protected $allowedFields = ['first_name','last_name','email','city','state','country','date','time','phone','public_id','amount','status','currency','client_tx_id','gw_tx_id','invoice','orderId','user','settled','amount_inr'];

}