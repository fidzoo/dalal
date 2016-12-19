<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Section;
use App\MainCategory;
use App\SubCategory;
use App\ProductSpecs;
use App\Http\Requests;
use Session, Redirect, File;

class ProductController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth', ['except' => [
                'index', 'show',
            ]]);
        } 
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
        if(Session::get('group') == 'merchant'){
        //get dropdowns Values
        $sections= Section::pluck('ar_title', 'id');

        //get specs heads:
        $specs= ProductSpecs::all();
        
        if(Session::get('lang') == 'en'){
            return view('en.product.product-create', compact('sections', 'specs'));
            }
        return view('product.product-create', compact('sections', 'specs'));
        }
        else return Redirect('/');
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
    public function show($id)
    {
        //
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
