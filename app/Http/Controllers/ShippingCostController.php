<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\ShippingCost;
use Illuminate\Http\Request;
use App\Http\Requests\ShippingStoreRequest;

class ShippingCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippingCost = ShippingCost::all();

        return view('home', compact('shippingCost'));


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
    public function store(ShippingStoreRequest $request)
    {
        $insertShippingCost = new ShippingCost();
        $insertShippingCost->rule_name = $request->rule_name;
        $insertShippingCost->delivery_route = $request->delivery_route;
        $insertShippingCost->delivery_type = $request->delivery_type;
        $insertShippingCost->weight = $request->weight;
        $insertShippingCost->expiry_date = $request->expiry_date;
        $insertShippingCost->cost = $request->cost;
        $insertShippingCost->save();

        return redirect()->route('shipping.index')->withSuccess('Data inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShippingCost  $shippingCost
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingCost $shippingCost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippingCost  $shippingCost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ShippingCost::findOrFail($id);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShippingCost  $shippingCost
     * @return \Illuminate\Http\Response
     */
    public function update(ShippingStoreRequest $request, $id)
    {
        $updateShippingCost = ShippingCost::findOrFail($id);
        $updateShippingCost->rule_name = $request->rule_name;
        $updateShippingCost->delivery_route = $request->delivery_route;
        $updateShippingCost->delivery_type = $request->delivery_type;
        $updateShippingCost->weight = $request->weight;
        $updateShippingCost->expiry_date = $request->expiry_date;
        $updateShippingCost->cost = $request->cost;
        $updateShippingCost->save();

        return redirect()->route('shipping.index')->withSuccess('Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShippingCost  $shippingCost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ShippingCost::findOrFail($id);

        $item->delete();

        return redirect()->route('shipping.index')->withSuccess('Data deleted successfully');
    }

    // Showing API Data
    public function list()
    {
        return ShippingCost::all();
    }
}
