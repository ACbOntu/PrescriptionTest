@extends('layouts.app')
@section('title') Prescription | Add @endsection
@section('content')
<!--- Form validation ---->
<script>
		function validateForm() {
				var a = document.forms["myForm"]["date"].value;
				var pdate = new Date( a );
				var b = document.forms["myForm"]["name"].value;
				var c = document.forms["myForm"]["age"].value;
				var d = document.forms["myForm"]["gender"].value;
				var diagnosis = document.forms["myForm"]["diagnosis"].value;
				var medicines = document.forms["myForm"]["medicines"].value;
				var g = document.forms["myForm"]["nextVisit"].value;
				var ndate = new Date(g);
				if(a==null | a==""){
					alert("Prescription date is required");
					myForm.date.focus();
					return false;
				}

				if(b==null | b==""){
					alert("Patient Name is required");
					myForm.date.focus();
					return false;
				}

				if(c==null | c==""){
					alert("Patient Age is required");
					myForm.date.focus();
					return false;
				}

				if(c <1 ) {
						alert("Age can not be negative or zero");
						myForm.age.focus();
						return false;
				}

				if(c >150 ) {
						alert("Age can not be so large");
						myForm.age.focus();
						return false;
				}

				if(d==null | d==""){
					alert("Patient Gender is required");
					myForm.date.focus();
					return false;
				}

				if(diagnosis==null | diagnosis==""){
					alert("Diagnosis is required");
					myForm.date.focus();
					return false;
				}

				if(medicines==null | medicines==""){
					alert("Medicines are required");
					myForm.date.focus();
					return false;
				}

				if(ndate<pdate){
						alert("Next visit date should be greater than prescription date");
						return false;
					}
		}
</script>

<!--- Reqyuried Field input ------>
<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
	<div class="col-md-6 offset-md-3">
		<form  action="{{route('insert')}}" name="myForm" onsubmit="return validateForm()" method="post" >
			    		 {{ csrf_field() }}
							 @if ($errors->any())
							     <div class="alert alert-danger">
							         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							         <ul>
							             @foreach ($errors->all() as $error)
							                 <p>{{ $error }}</p>
							             @endforeach
							         </ul>
							     </div>
							 @endif
			    		<center><h2>Prescription Details</h2></center>
                 <div class="form-group">
                    <label for="date" style="color: #000000;">Prescription Date:</label>
                      <input type="date" name="date" id="date" class="form-control input-md" placeholder="date">
                    </div>


			    				<div class="form-group">
			    				<label for="name" style="color: #000000;">Patient Name </label>
			    				<input type="text" name="name" id="name" class="form-control input-md" placeholder="Full Name">
			    				</div>
			    				<div class="form-group">
			    				<label for="age" style="color: #000000;">Patient Age </label>
			    				<input type="number" name="age" id="age" class="form-control input-md" placeholder="Patient age">
			    				</div>

                  <input type="radio" id="gender" name="gender" value="1">
                      <label for="gender" style="color: #000000;"> Male</label><br>
                  <input type="radio" id="gender" name="gender" value="0">
                      <label for="gender" style="color: #000000;"> Female</label><br>
                  <input type="radio" id="gender" name="gender" value="2">
                      <label for="gender" style="color: #000000;"> Others</label><br>


                      <label for="diagnosis" style="color: #000000;">Diagnosis</label>
                    <textarea id="diagnosis" name="diagnosis" rows="10" cols="70"></textarea>

                      <label for="medicines" style="color: #000000;">Medicines</label>
                      <textarea id="medicines" name="medicines" rows="10" cols="70"></textarea>


                      <div class="form-group">
                        <label for="nextVisit" style="color: #000000;">Next Visit Date:</label>
                          <input type= "date" name="nextVisit" id="nextVisit" class="form-control input-md" placeholder="Next visit date">
                        </div>
			    			<input type="submit" value="Add Prescription" class="btn btn-info btn-block">
			    		</form>
	         </div>
      </div>
@endsection
