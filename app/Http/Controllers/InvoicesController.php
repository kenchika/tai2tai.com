<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract;
use App\User;
use App\Contact;
use App\Adress;
use App\Bank;
use App\Company;
use App\Invoice;
use App\Service;
use Barryvdh\DomPDF\Facade as PDF;

class InvoicesController extends Controller
{

  public function save(Request $request,$user_id,$contract_id,$invoice_id){
    if (\Auth::check()){
      $contract= Contract::find($contract_id);
      $invoice= Invoice::find($invoice_id);
      if (\Auth::id()==$user_id && \Auth::id()==$invoice->Contract->User->id){

        if(!empty($servs=$invoice->Service)){
          foreach ($servs as $old){
            $old->delete();
          }
        }

        $total=0;
        foreach (range("1",$request->nb) as $nb){
          $temp=$request["servicePerUnit".$nb]*$request["serviceUnitNumber".$nb];
          $service=Service::create([
            'name'=> $request["serviceName".$nb],
            'type'=> $request["serviceType".$nb],
            'pricePerUnit'=> $request["servicePerUnit".$nb],
            'unitNumber'=> $request["serviceUnitNumber".$nb],
            'total'=> $temp,
          ]);
          $total=$total+$temp;
          $invoice->Service()->save($service);
        }

        $final=$total-$request->discount;
        $invoice->update([
          'invoiceNumber' => $request->invoiceNumber,
          'invoiceDate' => $request->invoiceDate,
          'comment' => $request->comment,
          'initialAmount' => $total,
          'discount' => $request->discount,
          'finalAmount' => $final
        ]);

        unset($request);
        //$pdf = PDF::loadView('invoice_pdf', [ 'contract'=>$contract,'invoice' => $invoice ]);
        //return $pdf->download($contract->Contact->name.' invoice n°'.$invoice->invoiceNumber.'.pdf');
        return view('contract',['user' => $user_id,'contract' => $contract]);
      }
    }
    return view('home',['user' => $user_id]);
  }

  public function generation($user_id,$contract_id,$invoice_id){
    if(\Auth::check()){
      $contract = Contract::find($contract_id);
      $invoice = Invoice::find($invoice_id);
      if(\Auth::id()==$user_id && \Auth::id()==$contract->User->id && \Auth::id()==$invoice->Contract->User->id){
        return view('invoiceGenerate', [ 'contract' => $contract, 'invoice' => $invoice]);
      }
    }
    return view('home');
  }

  public function pdf($user_id,$contract_id,$invoice_id){
    if(\Auth::check()){
      $contract = Contract::find($contract_id);
      $invoice = Invoice::find($invoice_id);
      if(\Auth::id()==$user_id && \Auth::id()==$contract->User->id && \Auth::id()==$invoice->Contract->User->id){
        $pdf = PDF::loadView('invoice_pdf', [ 'contract'=>$contract,'invoice' => $invoice ]);
        return $pdf->download($contract->Contact->name.' invoice n°'.$invoice->invoiceNumber.'.pdf');
      }
    }
    return view('home');
  }

  public function  addInvoice(request $request){
    $uid=\Auth::id();
    $contract = Contract::find($request->id);
    $invoice=Invoice::create([
      'finalAmount' => $request->amountInvoice
    ]);
    
    $contract->Invoice()->save($invoice);
    return redirect('/profile/'.$uid.'/contracts/'.$contract->id);
  }

  public function showInvoice($user_id,$contract_id,$invoice_id){
    if (\Auth::check()){
      if (\Auth::id()==$user_id ){
        $contract = Contract::find($contract_id);
        $invoice = Invoice::find($invoice_id);
        if (empty($invoice)) {
          return view('home',['user' => $user_id]);
        }
        return view('invoiceGenerate',['user' => $user_id,'contract' => $contract, 'invoice' => $invoice]);
      }
      else{
        return view('home',['user' => $user_id]);
      }
    }
  }

}
