@extends('layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
Departements
@stop
<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Departements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                Liste des Departements</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')


@if (session()->has('Add'))
    <script>
        window.onload = function() {
            notif({
                msg: " l'a 'Ajout a été  effectuée avec succès",
                type: "success"
            });
        }

    </script>
@endif

@if (session()->has('edit'))
    <script>
        window.onload = function() {
            notif({
                msg: " la Modification a été  effectuée avec succès",
                type: "success"
            });
        }

    </script>
@endif

@if (session()->has('delete'))
    <script>
        window.onload = function() {
            notif({
                msg: " la Suppression a été  effectuée avec succès",
                type: "error"
            });
        }

    </script>
@endif

<!-- row -->
<div class="row row-sm">
    <div class="col-xl-12">
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Ajouter un  departements</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('departements.store') }}" method="post">
            {{ csrf_field() }}
            <div class="modal-body">
               
                <div class="form-group">
                    <label for="nom"> Nom de la departements *</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">region</label>
                <select name="region_id" id="region_id" class="form-control" required>
                    <option value="" selected disabled> --indiquer la region--</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->nom }}</option>
                    @endforeach
                </select>
               
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Valider</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </form>
    </div>
</div>
</div>
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            
							<div class="d-flex justify-content-between">
								@can('utilisateurs')
									<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
										data-toggle="modal" href="#exampleModal"> Ajouter un  departements</a>
								@endcan
							</div>
                        </div>
                    </div>
                    <br>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
					<table class="table table-hover" id="departements" data-page-length='50' style=" text-align: center;">
						<thead>
                        <thead>
                            <tr>
                              
                                
								<th>Nom </th>
                                <th>Region </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departements as $key => $departements)
                                <tr>
                                   
                                
									<td>{{ $departements->nom}}</td>
                                    <td>{{ $departements->region->nom }}</td>
                                    <td>
                                        @can('afficher permissions')
                                            <a class="btn btn-success btn-sm"
                                                href="{{ route('departements.show', $departements->id) }}">Afficher</a>
                                        @endcan
                                        
                                        @can('modifier permissions')
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('departements.edit', $departements->id) }}">Modifier</a>
                                        @endcan

                                        @if ($departements->nom !== 'owner')
                                            @can('supprimer permissions')
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['departements.destroy',
                                                $departements->id], 'style' => 'display:inline']) !!}
                                                {!! Form::submit('supprimer', ['class' => 'btn btn-danger btn-sm']) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                        @endif


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>

<script src="{{ URL::asset('assets/js/modal.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<script>
	$(document).ready(function() {
    $('#departements').DataTable();
} );

</script>
@endsection
