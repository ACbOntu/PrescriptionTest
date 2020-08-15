@extends('layouts.app')
@section('title') Prescription | Home @endsection
@section('content')
<div class="container" style="margin-top:50px;">
    <div class="row">
        <div class="col-lg-12 col-md-offset-2">
            <div class="panel panel-default">
              <div class="row">
          <!-- Filter data according to given date --->
              <form action="{{route('home')}}" method="get">
                 {{ csrf_field() }}
               <label for="from_date">From</label>
                <input type="date" id="from_date" name="from_date" >
               <label for="to_date">To</label>
                <input type="date" id="to_date" name="to_date" >
                <input type="submit" value="Filter" class="btn btn-info">
              </form>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <a type="button" name="all" class="btn btn-success" href="{{route('all')}}"> All Prescriptions </a>

                </div>

                <!-- <center style="background:yellow;color:black; margin:10px;">  <caption ><h4>Prescriptions of <?php echo \Carbon\Carbon::now()->format('F'); ?> month </h4></caption></center> -->
             <!--- Showing data ---->
            <table class="table table-responsive table-hover" style="margin-top:20px;">
                 </caption
                <tr>
                  <th> Prescription Date </th>
                  <th> Patient Name </th>
                  <th> Age </th>
                  <th> Gender </th>
                  <th> Diagnosis </th>
                  <th> Medicines </th>
                  <th> Next Visiting date </th>
                  <th> created by </th>
                  <th colspan="2" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Actions </th>
                </tr>
                  @foreach($prescriptions as $prescription)
                <tr>
                  <td> {{$prescription->date}} </td>
                  <td> {{$prescription->patient_name}} </td>
                  <td> {{$prescription->patient_age}} </td>
                  <td> <?php if($prescription->gender == 1){
                    echo "Male";
                  }
                    elseif($prescription->gender == 0){
                      echo "Female";
                    }
                      else{
                        echo "Others";
                      }  ?> </td>
                  <td> {{$prescription->diagnosis}} </td>
                  <td> {{$prescription->medicines}} </td>
                  <td> {{$prescription->next_visit}} </td>
                  <td> {{App\User::where('id',$prescription->user_id )->first()->username}} </td>
                  <td> <a  class="btn btn-info" href="{{route('edit',$prescription->id)}}"> Edit </a></td>
                <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$prescription->id}}" href="#" > Delete </button>  </td> -->
              <td>    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModel{{$prescription->id}}">Delete</button> </td>
                </tr>

                  <!--- Delete Confirmation ----->
                <div class="modal fade" id="myModel{{$prescription->id}}" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Message</h4>
                      </div>
                      <div class="modal-body">
                        <p>Are you sure that you want to delete this prescription ?</p>
                      </div>
                      <div class="modal-footer">
                        <a type="button" class="btn btn-danger" href="{{route('delete',$prescription->id)}}">Yes</a>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>
          @endforeach
        </table>
      </div>
  </div>
  </div>
</div>

@endsection
