<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ab extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
		var $a;
		
	var $b;
	
    public function index()
    {
        $data = encrypt(4627);
		$this->a=$data;
		echo $this->a;
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
    public function show()
    {
		$this->b='eyJpdiI6Im0vUUNBQUFmbnhyeHJGeEZoWXNYSFE9PSIsInZhbHVlIjoiZHdVbm1GTVdUREFUMmEvclFjZHZGUT09IiwibWFjIjoiZDE0ZDFkNjY4MGY3OWNkNDY1MmFhYjkxNDVmNTE5MTUyZDY2ODFlMDM2MTQwOGNhMTc4NjhjMWE5ZWRjMTU4ZCIsInRhZyI6IiJ9';
       $val = decrypt($this->b);
	   echo $val;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
