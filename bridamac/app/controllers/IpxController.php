<?php

class IpxController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */




	public function index()
	{
		//
		// return Response::json(array('index' => 'cuentas 2'));
		// $accounts = Account::all();

		// return View::make('cuentas.index')->with('cuentas',$accounts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
			return View::make('cuentas.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$account = new Account;

		$account->setDomain(Input::get('domain'));
		$account->setNit(Input::get('nit'));
		$account->setName(Input::get('name'));
		$account->setEmail(Input::get('email'));


		// return $account->getErrorMessage();
		if($account->Guardar())
		{	
			//redireccionar con el mensaje a la siguiente vista 
			
			Session::flash('mensaje',$account->getErrorMessage());


			$direccion = "http://".$account->domain.".localhost/";

					//enviando correo de bienvenida
			
			global $correo; 
			$correo=$account->getEmail();
			// return Response::json($correo);
			Mail::send('emails.bienvenida', array('direccion' => $direccion ,'name'=>$account->getName(),'nit'=>$account->getNit()), function($message)
			{
				global $correo; 
			    $message->to($correo, '')->subject('Factura Virtual');
			});
			//
		
			// $direccion = "/crear/sucursal";
			

			return Redirect::to($direccion);
		}

		Session::flash('error',$account->getErrorMessage());
		return Redirect::to('crear');
		
	}
	public function dashboard()
	{	
		$sucursales = Branch::where('account_id',Auth::user()->account_id)->get();
		$usuarios = Account::find(Auth::user()->account_id)->users;
		$clientes = Account::find(Auth::user()->account_id)->clients;
		$productos = Account::find(Auth::user()->account_id)->products;	

		$informacionCuenta = array('sucursales' =>sizeof($sucursales),'usuarios' => sizeof($usuarios),'clientes' => sizeof($clientes),'productos' => sizeof($productos)  );
		// return Response::json($informacionCuenta);
		return View::make('cuentas.dashboard')->with('cuenta',$informacionCuenta);
	}
}