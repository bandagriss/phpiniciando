@extends('layout')


@section('title') Creacion de Cuenta @stop
@section('head') 

	<style type="text/css">

      .modal-header {
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
       }
      .modal-header h4 {
        margin:0;
      }
      .modal-header img {
      	background-color: #404040

      }
      .form-signin {
    	  max-width: 800px;
    	  margin: 30px  auto !important;
        background: #fff;
      }
      p.link a {
        font-size: 11px;
      }
      .form-signin .inner {
  	    padding: 20px;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
		  }
  		.form-signin .checkbox {
  		  font-weight: normal;
  		}
  		.form-signin .form-control {
  		  margin-bottom: 17px !important;
  		}
  		.form-signin .form-control:focus {
  		  z-index: 2;
  		}
      .titlefv {
        float: right;
      }

		
  </style>
@stop

@section('content')
	
 

	{{Former::framework('TwitterBootstrap3')}}
	
	{{ Former::open('login')->addClass('form-signin')->rules(array(
      'name' => 'required|min:3',
      'nit' => 'required|Numeric|min:5',
      'username' => 'required|min:4',
      'password' => 'required',
      'password_confirmation' => 'required'
      
      )) }}

	 <div class="modal-header">
     <img style="display:block;margin:0 auto 0 auto;" src="{{ asset('images/icon-login.png') }}" />      
      </div>
      
      <div class="inner">

      <h3 style="text-align: center; margin:0 auto 0 auto; color:#404040;">Crear Cuenta</h3>
      
      <hr>
			
      <div class="row">
        <div class="col-md-10 col-mm-offset-2">
        {{ Former::text('code')->label('Llave')->placeholder('Ingrese Código proporcionado') }}
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
        {{ Former::legend('Datos de la Empresa') }}
        {{ Former::text('nit')->label('NIT (*)')->title('Solo se acepta Números') }}
        {{ Former::text('name')->label('EMPRESA (*)') }}
        </div>
  
      <div class="col-md-6">
        {{ Former::legend('Datos de Ingreso') }}
        {{ Former::text('username')->label('nombre de Usuario (*)') }}
        {{ Former::password('password')->label('contraseña (*)')->pattern('.{4,}')->title('Mínimo cuatro caracteres') }}        
        </div>
      </div>

			<p><center>
      <button type="button" class="btn btn-primary" id="proPlanButton" onclick="submitPlan()">Continuar</button>                    
		</center>
      </p>


		{{ Former::close() }}

      </div>
    </div>
@stop 
