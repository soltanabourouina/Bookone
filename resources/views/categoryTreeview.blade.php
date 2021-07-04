<!DOCTYPE html>

<html>

<head>

	

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link href="/css/treeview.css" rel="stylesheet">

</head>

<body>

	<div class="container">     

		<div class="panel panel-primary">

			<div class="panel-heading">Organismes</div>

	  		<div class="panel-body">

	  			<div class="row">

	  				<div class="col-md-6">

	  					<h3>Liste des organismes</h3>

				        <ul id="tree1">

				            @foreach($categories as $category)

				                <li>

				                    {{ $category->name }}

				                    @if(count($category->childs))

				                        @include('manageChild',['childs' => $category->childs])

				                    @endif

				                </li>

				            @endforeach

				        </ul>

	  				</div>

	  				<div class="col-md-6">

	  					<h3>Ajouter un organisme</h3>


				  			{!! Form::open(['route'=>'add.category']) !!}


				  				@if ($message = Session::get('success'))

									<div class="alert alert-success alert-block">

										<button type="button" class="close" data-dismiss="alert">×</button>	

									        <strong>{{ $message }}</strong>

									</div>

								@endif


				  				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

									{!! Form::label('Orga:') !!}

									{!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'organisme']) !!}

									<span class="text-danger">{{ $errors->first('name') }}</span>

								</div>


								<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">

									{!! Form::label('catégorie de l\'organisme:') !!}

									{!! Form::select('parent_id',$allCategories, old('parent_id'), ['class'=>'form-control', 'placeholder'=>'Selectionnez une catégorie']) !!}

									<span class="text-danger">{{ $errors->first('parent_id') }}</span>

								</div>


								<div class="form-group">

									<button class="btn btn-success">Ajouter </button>

								</div>


				  			{!! Form::close() !!}


	  				</div>

	  			</div>


	  			

	  		</div>

        </div>

    </div>

    <script src="/js/treeview.js"></script>

</body>

</html>