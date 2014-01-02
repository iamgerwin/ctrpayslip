<?php

class CompanyController extends BaseController {

	protected $company;

	public function __construct(Company $company)
	{

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Company::all();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('companies.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$rules = [
				'Name' => 'required',
				'Shortname' => '',
				'Address' => '',
				'Contact' => '',
				'Active' => ''
				];

		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails()) {$msgs = $validation->messages();}
		
		dd($msgs->all());
		Company::create([
				'companyname' => $input['Name'],
				'shortname' => $input['Shortname'],
				'address' => $input['Address'],
				'contactno' => $input['Contact'],
				'datecreated' => $input['datecreated'],
				'isdeleted' => $input['Active']
			]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Company::where('companyid',$id)->active()->first();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        return Company::where('companyid',$id)->update([
        		'companyname' => $input['name'],
        		'shortname' => $input['shortname'],
        		'address' => $input['address'],
        		'contactno' => $input['contactno'],
        		'datecreated' => $input['datecreated'],
        		'isdeleted' => $input['isdeleted']
        	]);
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
