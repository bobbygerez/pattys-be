<?php

namespace App\Repo\Transaction;

use App\Model\Purchase;
use App\Model\PurchaseReceived;
use App\Model\Transaction;
use App\Repo\BaseRepository;
use App\Model\Payee;
use App\Model\TaxType;
use App\Model\Payor;
use Auth;

class TransactionRepository extends BaseRepository implements TransactionInterface
{

    public function __construct()
    {

        $this->modelName = new Transaction();

    }

    public function jobs($modelType, $modelId){
        return $modelType::where('id', $modelId)->first()->jobs;
    }

    public function payeeFillable($array)
    {
        $payee = new Payee();
        return collect($array)->filter(function ($value, $key) use ($payee) {
            return in_array($key, $payee->getFillable());
        })->toArray();
    }

    public function payorFillable($array)
    {
        $payor = new Payor();
        return collect($array)->filter(function ($value, $key) use ($payor) {
            return in_array($key, $payor->getFillable());
        })->toArray();
    }

    public function create($request)
    {

        $reqTrans = $request->transaction;
        $reqTrans['refnum'] = str_replace('0.', '', microtime() . uniqid(true));
        $reqTrans['created_by'] = Auth::User()->id;
        $transaction = $this->modelName->create($reqTrans);

        $this->find($transaction->id)->payee()->create($this->payeeFillable( $request->payee) );

        foreach ($request->invoices as $invoice) {
            if($invoice['purchase_received_id'] != ''){
                unset($invoice['id']);
                $this->find($transaction->id)->purchaseReceived()->attach($transaction->id, $invoice);
            }
            
        }
        foreach ($request->additionalItems as $item){
            unset($item['id']);
            $this->find($transaction->id)->itemTransaction()->create($item);
        }
    }

    public function transactable($modelType, $id)
    {

        return $modelType::where('id', $id)
            ->whereHas('accessRights.roles.users', function ($q) {
                // $q->where('users.id', Auth::User()->id);
            })
            ->relTable()
            ->first()
            ->transactions;

    }

    public function items($modelType, $id)
    {
        return $modelType::where('id', $id)
            ->whereHas('accessRights.roles.users', function ($q) {
                // $q->where('users.id', Auth::User()->id);
            })
            ->relTable()
            ->first()
            ->items;
    }

    public function purchase($id)
    {

        return Purchase::where('id', $id)
        // ->whereHas('accessRights.roles.users', function($q){
        //     $q->where('users.id', Auth::User()->id);
        // })
            ->relTable()
            ->first();

    }

    public function purchaseReceived($modelType, $id)
    {
        return $modelType::where('id', $id)
            ->whereHas('accessRights.roles.users', function ($q) {
                // $q->where('users.id', Auth::User()->id);
            })
            ->with(['purchaseReceived.items.branches', 'purchaseReceived.items.logistics', 'purchaseReceived.items.commissaries', 'purchaseReceived.items.otherVendors'])
            ->first()
            ->purchaseReceived;
    }
    public function userEntities($modelType)
    {

        return $modelType::whereHas('accessRights.roles.users', function ($q) {
            // $q->where('users.id', Auth::User()->id);
        })
            ->get();

    }

    public function entity($modelType, $id)
    {

        return $modelType::where('id', $id)->with(['address.brgy', 'address.city', 'address.province', 'address.country'])->first();

    }

    public function chartAccounts($modelType, $id)
    {

        return $modelType::where('id', $id)->with('company.chartAccounts')->first()->company->chartAccounts;
    }



    public function payee($transactionId)
    {

        $trans = $this->modelName->where('id', $transactionId)->first();
        if ($trans->payee !== null) {
            return $trans->payee->payable;
        }

        return null;
    }

    public function editPurchaseReceived($purchaseId)
    {

        return PurchaseReceived::where('id', $purchaseId)->with('items')->first();
    }

    public function taxTypes(){

        return TaxType::all();
    }

    public function saleInvoices($modelType, $id){

        return $modelType::where('id', $id)
                    ->with(['saleInvoices.products'])->first();
    }

}
