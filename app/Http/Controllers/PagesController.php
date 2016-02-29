<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    // Quang Nguyen
    public function aboutme(){
        // Cach 0
        //return view("pages.aboutme");

        // Cach 1
        //$data= 'My name is Quang Dep Trai';
        //return view("pages.aboutme")->with('name',$data);
        
        // Cach 2 
        // $name = 'My name is Hieu';
        // $age = '24';
        // return view("pages.aboutme")->with([
        //     'name' => $name,
        //     'age' => $age
        // ]);

        //Cach 3
        $name = 'My name is Quang Dep Trai';
        $age = '24';
        $data = [];
        $data['name'] = $name;
        $data['age'] = $age;
        return view("pages.aboutme",$data);
    }

    public function about(){
        $name = 'My name is Quang Dep Trai';
        $age = '24';
        $data = [];
        $data['name'] = $name;
        $data['age'] = $age;
        return view('pages.about', $data);
    }
    public function contact(){
        return view('pages.contact');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
