<?php

namespace App\Http\Controllers\API\Commissary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Commissary;
use App\Traits\PaginateCollection;

class CommissaryController extends Controller
{
    use PaginateCollection;

    public function __construct(){

        $this->authorizeResource(Commissary::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([

            'commissaries' => $this->paginate(
                Commissary::where('name', 'like', '%'. app()->make('request')->filter . '%')
                        ->relTable()
                        ->orderBy('created_at', 'desc')
                        ->get()
            )

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
    public function store(Commissary $commissary, Request $request)
    {
        $commissary = Commissary::create($request->all());
        $commissary = Commissary::find($commissary->id);
        $commissary->address()->create($request['address']);
        $commissary->businessInfo()->create($request['business_info']);

        return response()->json([
                'success' => true
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Commissary $commissary, Request $request)
    {
        return response()->json([
            'commissary' => Commissary::where('id', $request->id)
                            ->relTable()
                            ->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Commissary $commissary, Request $request)
    {
        return response()->json([
            'commissary' => Commissary::where('id', $request->id)
                            ->relTable()
                            ->first()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Commissary $commissary, Request $request)
    {
        $commissary = Commissary::find($request->id);
        $commissary->update($request->all());
        $commissary->address()->update([
            'country_id' => $request->address['country_id'],
            'region_id' =>  $request->address['region_id'],
            'province_id' =>  $request->address['province_id'],
            'city_id' =>  $request->address['city_id'],
            'brgy_id' =>  $request->address['brgy_id'],
        ]);
        $commissary->businessInfo()->update([
            'business_type_id' => $request->business_info['business_type_id'],
            'vat_type_id' => $request->business_info['vat_type_id'],
            'telephone' => $request->business_info['telephone'],
            'email' => $request->business_info['email'],
            'tin' => $request->business_info['tin'],
            'website' => $request->business_info['website'],
        ]);
        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commissary $commissary, Request $request)
    {
        Commissary::find($request->id)->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
