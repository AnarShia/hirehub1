<?php

namespace App\Http\Controllers;

use App\Models\hireMe;
use Illuminate\Http\Request;

class HireMeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        $request->validate([
            'user_id' => 'required',
            'company_id' => 'required',
        ]);
        hireMe::create([
            'user_id' => $request->user_id,
            'company_id' => $request->company_id,
        ]);

        return redirect('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hireMe  $hireMe
     * @return \Illuminate\Http\Response
     */
    public function show(hireMe $hireMe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hireMe  $hireMe
     * @return \Illuminate\Http\Response
     */
    public function edit(hireMe $hireMe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hireMe  $hireMe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hireMe $hireMe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hireMe  $hireMe
     * @return \Illuminate\Http\Response
     */
    public function destroy(hireMe $hireMe)
    {
        //
    }
}
