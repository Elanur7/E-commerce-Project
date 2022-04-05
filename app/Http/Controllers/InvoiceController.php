<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    protected $invoice;
    protected $order;

    public function __construct(Invoice $invoice,Order $order){
        $this->invoice = $invoice;
        $this->order = $order;
    }

    public function index(){
        $order= $this->order->where("Status","Teslim Edildi")->get();
        if(isset($order)){
            $invoice = $this->order->get();
            return $invoice;
        }else{
            return ["message"=>"Teslim edilen ürün olmadığından fatura bulunmamaktadır."];
        }

    }
}
