@extends('layouts.app')
@section('title') Prescription | Report @endsection
@section('content')
<div class="container" style="margin-top:20px;">
    <div class="row">
              <div class="container">
                <!-- Input date for the report -->
                <form action="{{route('report')}}" method="get">
                   {{ csrf_field() }}
                 <label for="from_date"><b>Report for</b></label>
                  <input type="date" id="date" name="date" >
                  <input type="submit" value="Show report" class="btn btn-info">
                </form>
                <div class="row" style="margin:10px;">
                  <div class="col-sm-1-6">
                    <a class="btn btn-success" href="{{route('getDataFromApi')}}"> Data From API </a>
                  </div>
                  <div class="col-sm-1-6" style="margin-left:5px;">
                      <a class="btn btn-success" href="{{url('api/v1/prescription')}}"> Json Prescription List </a>
                  </div>
                </div>
              </div>
              <!-- Showing data -->
          <div class="container">
            <table class="table table-hover" style="margin-top:20px;">
                <tr>
                  <th> Prescription Date </th>
                  <th> Patient Name </th>
                  <th> Age </th>
                  <th> Gender </th>
                  <th> Diagnosis </th>
                  <th> Medicines </th>
                  <th> Next Visiting date </th>
                  <th> created by </th>

                </tr>
                <?php $i = 0; ?>
                    @foreach($prescriptions as $prescription)
                    <?php $i++; ?>
                    <tr>
                        <td> {{ $prescription->date }} </td>
                        <td> {{ $prescription->patient_name }} </td>
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
                        <td> {{ $prescription->diagnosis }} </td>
                        <td> {{ $prescription->medicines }} </td>
                        <td> {{ $prescription->next_visit }} </td>
                        <td> {{App\User::where('id',$prescription->user_id )->first()->username}} </td>
                    </tr>
                      @endforeach
                      @if(!empty($prescriptions))
                    <tr>
                      <td colspan = "4"> Number of prescriptions on this day =  <?php echo $i; ?> </td>
                    </tr>
                    @endif
            </table>


    </div>
</div>
@endsection
