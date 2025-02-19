<?php

namespace App\Http\Controllers;

use App\Models\IpAddress;
use Illuminate\Http\Request;


class IpAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("ipaddress.index", [
            "ips" => IpAddress::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("ipaddress.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $ipAddress = new IpAddress();

        $data = $request->validate([
            'ip' => 'required|ip',
            'label' => 'required|string|max:255',
            'comment' => ''
        ]);
        $data['user_id'] = 1;

        $response = $ipAddress->create($data);
        return redirect('/ipaddress')->with('success', 'IP Address added.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = IpAddress::find($id);
        return view('ipaddress.edit', [
            'ip' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IpAddress $ipAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, Request $request, IpAddress $ipAddress)
    {
        $data = $request->validate([
            'ip' => 'required|ip',
            'label' => 'required|string|max:255',
            'comment' => ''
        ]);
        $data['user_id'] = 1;

        $response = $ipAddress->find($id)
            ->update($data);
        return redirect('/ipaddress')->with('success', 'IP Address updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IpAddress $ipAddress)
    {
        //
    }
}
