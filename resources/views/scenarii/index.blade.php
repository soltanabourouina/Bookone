@extends('layouts.master')
@section('css')

    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
Budget|scenarii|projection
@stop
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
            <h4 class="content-title mb-0 my-auto">Budget|scenarii|projection</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                scenarii</span>
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
                msg: " la Ajout a été  effectuée avec succès",
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
            <h5 class="modal-title" id="exampleModalLabel"> Ajouter un scenario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('scenarii.store') }}" method="post">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                    <label for="numscenario"> numscenario scenarii*</label>
                    <input type="text" class="form-control" id="numscenario" name="numscenario" required>
                </div>
                <div class="form-group">
                    <label for="total"> total du scenarii *</label>
                    <input type="text" class="form-control" id="total" name="total" required>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Valider</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </form>
    </div>
</div>
</div>



<br>
<br>
<div class="card-body">
    <div class="table-responsive">
        <table id="bud" class="display" style="width:100%">
         
            <thead>
                <tr>
                  

                    <th rowspan="2">#</th>
                    <th>1</th>
                    <th>2 </th>
                    <th>3 </th>
                    <th>Tot Trim1 </th>
                    <th>4</th>
                    <th>5 </th>
                    <th>6 </th>
                    <th>Tot Trim2 </th>
                    <th>7</th>
                    <th>8 </th>
                    <th>9</th>
                    <th>Tot Trim3 </th>
                    <th>10</th>
                    <th>11 </th>
                    <th>12</th>
                    <th>Tot Trim4 </th>
                </tr>
            </thead>
            <tbody>


                    @isset($yearInit) <!--année initial -->
                   
                       <tr> 
                      
                       
                        {{$budgetM1 = Helpers::showMonetaryValue($budM1->Sum('amount'))}}
                        {{$budgetM2 = Helpers::showMonetaryValue($budM2->Sum('amount'))}}
                        {{$budgetM3 = Helpers::showMonetaryValue($budM3->Sum('amount'))}}

                        {{$budgetM4 = Helpers::showMonetaryValue($budM4->Sum('amount'))}}
                        {{$budgetM5 = Helpers::showMonetaryValue($budM5->Sum('amount'))}}
                        {{$budgetM6 = Helpers::showMonetaryValue($budM6->Sum('amount'))}}

                        {{$budgetM7 = Helpers::showMonetaryValue($budM7->Sum('amount'))}}
                        {{$budgetM8 = Helpers::showMonetaryValue($budM8->Sum('amount'))}}
                        {{$budgetM9 = Helpers::showMonetaryValue($budM9->Sum('amount'))}}
                        {{$budgetM10 = Helpers::showMonetaryValue($budM10->Sum('amount'))}}
                        {{$budgetM11 = Helpers::showMonetaryValue($budM11->Sum('amount'))}}
                        {{$budgetM12 = Helpers::showMonetaryValue($budM12->Sum('amount'))}}
                        <td>BUD 01 <br>
                            
                        </td>
                      
                        
                        <td>{{($budgetM1) }}</td>
                        <td>{{$budgetM2}}</td>
                        <td>{{$budgetM3}}</td>
                        <td>{{Helpers::showMonetaryValue($t1)}}</td>
                        <td>{{$budgetM4}}</td>
                        <td>{{$budgetM5}}</td>
                        <td>{{$budgetM6}}</td>
                        <td>{{Helpers::showMonetaryValue($t2)}}</td>
                        <td>{{$budgetM7}}</td>
                        <td>{{$budgetM8}}</td>
                        <td>{{$budgetM9}}</td>
                        <td>{{Helpers::showMonetaryValue($t3)}}</td>
                        <td>{{$budgetM10}}</td>
                        <td>{{$budgetM11}}</td>
                        <td>{{$budgetM12}}</td>
                        <td>{{Helpers::showMonetaryValue($t4)}}</td>
                      
                    </tr>
                       
                    @endisset
             
                
                   
                
            </tbody>
        </table>
    </div>
</div>
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            
							<div class="col-lg-6 justify-content-between">
								@can('utilisateurs')
									<a class="modal-effect btn btn-primary" data-effect="effect-scale"
										data-toggle="modal" href="#exampleModal"> Ajouter un scenarii</a>
                                        <a class="btn btn-warning" href="{{ route('home') }}">Retour</a>
                                        @endcan

                            
							</div>
                        </div>
                    </div>
                    <br>
                </div>

</div>
       <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title"> Supprimer un scenario</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <form action="scenarii/destroy" method="post">
                   {{ method_field('delete') }}
                   {{ csrf_field() }}
                   <div class="modal-body">
                       <p>  Etes vous sur de vouloir supprimer ce scenario? </p><br>
                       <input type="hidden" name="pro_id" id="pro_id" value="">
                       <input class="form-control" name="numscenario" id="numscenario" type="text" readonly>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                       <button type="submit" class="btn btn-danger">Valider</button>
                   </div>
               </form>
           </div>
       </div>
   </div>  



<br>
<br>





















            <div class="card-body">
                <div class="table-responsive">
					<table id="scenarii" class="display" style="width:100%"
						<thead>
                        <thead>
                            <tr>
                                <th>numero du scenario</th>
								<th>total </th>
                                <th>Evenements </th>
                                <th>valide </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($scenarios as $scenarii)
                                 <tr>
                                   
                                   
                                    <td>{{ $scenarii->numscenario}}</td>
									<td>{{ $scenarii->total}}</td>
                                    <td>
                                        @foreach($scenarii->postedepenses as $postedepense)
                                        <div striped>
                                         {{$postedepense->code}}
                                           </div> 
                                        @endforeach

                                    </td>
                                    <td>
                                        @if ($scenarii->isvalid == 0)
                                            

                                                @can('afficher permissions')
                                                 <a class="btn btn-outline-success btn-sm"{{ $scenarii->isvalid }}>valider le scenario</a>
                                                 @endcan
                                            
                                        @else
                                                @can('afficher permissions')
                                                <a class="btn btn-gray btn-sm" {{$scenarii->isvalid }}"> Mode projection sur le scénario {{ $scenarii->numscenario }}</a>
                                                @endcan
                                       
                                        @endif
                                    </td>
                                    <td>
                                       
                                        
                                      
                                    @can('utilisateurs')
                                        <button class="btn btn-danger btn-sm " data-pro_id="{{ $scenarii->id }}"
                                            data-numscenario="{{$scenarii->numscenario}}" data-toggle="modal"
                                            data-target="#modaldemo9">supprimer</button>
                                    @endcan


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
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<!--Internal  Datatable js -->

<script src="{{ URL::asset('assets/js/modal.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<script>



$('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var pro_id = button.data('pro_id')
        var numscenario = button.data('numscenario')
        var modal = $(this)

        modal.find('.modal-body #pro_id').val(pro_id);
        modal.find('.modal-body #numscenario').val(numscenario);
    });
$(document).ready(function() {
    var table = $('#scenarii').DataTable( {
       
       retrieve: true,
   
        "order": [[1, 'asc']]
    } );
   
   

    } );

    $(document).ready(function() {
    var table = $('#bud').DataTable( {
       
       retrieve: true,
   
        "order": [[1, 'asc']]
    } );
   
   

    } );

</script>
@endsection
