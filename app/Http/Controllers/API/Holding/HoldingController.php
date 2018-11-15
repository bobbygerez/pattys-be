<?php

namespace App\Http\Controllers\API\Holding;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Holding;
use Illuminate\Pagination\LengthAwarePaginator;
use Auth;

class HoldingController extends Controller
{
    public function __construct()
    {
        
        $this->authorizeResource(Holding::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $collection = Holding::relTable()->get();

        return response()->json([
                'holdings' => $collection
            ]);  

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Holding $holding)
    {
        return response()->json([

                'holding' => $holding->relTable()->first()

            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Holding $holding, Request $request)
    {
        
        $holding = Holding::where('id', $request->id)->relTable()->first();

        return response()->json([
                'holding' => $holding
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Holding $holding, Request $request)
    {

        $holding = Holding::where('id', $request->id)->first();
        $holding->update($request->all());
        $holding->address()->update([
                'country_id' => $request->country_id,
                'region_id' => $request->region_id,
                'province_id' => $request->province_id,
                'city_id' => $request->city_id,
                'brgy_id' => $request->brgy_id
            ]);

        return response()->json([
                'holding' => Holding::where('id', $request->id)->first()
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $holding = Holding::find($id);
        $holding->delete();
        return response()->json([
                'success' => true
            ]);
    }

    public function role(){

        $role = collect(Auth::User()->roles)->filter(function($role){

            if ($role->access_level == 1) {
                
                return $role->name;
            }

        })->first();

        return $role;
    }

    public function paginate($collection){

        $request =  app()->make('request');

        return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);
    }
}
