<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use Illuminate\Http\Request;

class CompanyInfoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() { $this->middleware('auth'); }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('pages.company_info.index')->with('company_info', CompanyInfo::first());
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('pages.company_info.create');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'type' => 'required',
            'cover_image' => 'image|nullable|max:1999'
            ]);

        //Handle File Upload
        if ($request->hasFile('cover_image')) {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/company', $fileNameToStore);
        } else $fileNameToStore = 'noimage.jpg';

        $company_info = new CompanyInfo;

        $company_info->name = $validatedData['name'];
        $company_info->address = $validatedData['address'];
        $company_info->email = $validatedData['email'];
        $company_info->type = $validatedData['type'];
        $company_info->mobile = $request->get('mobile');
        $company_info->landline = $request->get('landline');
        $company_info->tin = $request->get('tin');
        $company_info->registered = $request->get('registered');
        $company_info->rdo = $request->get('rdo');
        $company_info->nature = $request->get('nature');
        $company_info->image = $fileNameToStore;

        $company_info->save();

        return redirect('/companyInfo')
            ->with('success', 'Updated Company\'s Informations Successfully!')
            ->with('company_info', $company_info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('pages.company_info.edit')->with('company_info', CompanyInfo::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'type' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        $company_info = CompanyInfo::find($id);

        //Handle File Upload
        if ($request->hasFile('cover_image')) {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/company', $fileNameToStore);
            $company_info->image = $fileNameToStore;
        }


        $company_info->name = $validatedData['name'];
        $company_info->address = $validatedData['address'];
        $company_info->email = $validatedData['email'];
        $company_info->type = $validatedData['type'];
        $company_info->mobile = $request->get('mobile');
        $company_info->landline = $request->get('landline');
        $company_info->tin = $request->get('tin');
        $company_info->registered = $request->get('registered');
        $company_info->rdo = $request->get('rdo');
        $company_info->nature = $request->get('nature');

        $company_info->save();

        return redirect('/companyInfo')
            ->with('success', 'Updated Company\'s Informations Successfully!')
            ->with('company_info', CompanyInfo::find($id));
    }
}
