<?php

class AnnounceController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return 'gerwin';
        //return View::make('announces.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('announces.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		if( ! Announce::isValid($input))
		{
			return Redirect::back()->withInput()->withErrors(Announce::$errors);

		}
		
		Announce::insert([
                'title' => $input['title'],
                'content' => $input['content'],
                'datecreated' => $input['datecreated'],
                'lastupdated' => $input['lastupdated'],
                'dateexpiring' => $input['dateexpiring'],
                'companyaddressed' => $input['companyaddressed'],
                'isposted' => $input['isposted'],
                'isdeleted' => $input['isdeleted'],
                'createdby' => $input['createdby']
			]);
		return true;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('announces.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('announces.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		if( ! Announce::isValid($input))
		{
			return Redirect::back()->withInput()->withErrors(Announce::$errors);
		}
		Annouce::update([
                'title' => $input['title'],
                'content' => $input['content'],
                'lastupdated' => $input['lastupdated'],
                'dateexpiring' => $input['dateexpiring'],
                'companyaddressed' => $input['companyaddressed'],
                'isposted' => $input['isposted'],
                'isdeleted' => $input['isdeleted'],
                'createdby' => $input['createdby']
			]);
		return true;
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
