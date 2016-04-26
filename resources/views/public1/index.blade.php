@extends('layouts.app')

@section('content')

<div class="jumbotron" id="jumbotron-aboutpage1">
    <div class="container">
        <h1 class="text-center">Data Analysis</h1>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <p>Choose the kind of data you want to analyze</p>
            </div>
        </div>
    </div>
</div>
<form class="search" action="{{ url('/public/search') }}" method="POST">
								<div class="form-group1">
									<label>Gender</label>
									<div class="radio">
										<label>
											<input type="radio" name="age" id="age" value="Male" checked>Male
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="age" id="age" value="Female">Female
										</label>
									</div>
								</div>
<div class="form-group">
	<label>State</label>
			<select class="form-control" id="state" name="state">
					<option value="AL">AL</option>
					<option value="Ak">AK</option>
					<option value="AS">AS</option>
					<option value="AZ">AZ</option>
					<option value="AR">AR</option>
					<option value="CA">CA</option>
					<option value="CO">CO</option>
					<option value="CT">CT</option>
					<option value="DE">DE</option>
					<option value="DC">DC</option>
					<option value="FL">FL</option>
					<option value="GA">GA</option>
					<option value="GU">GU</option>
					<option value="HI">HI</option>
					<option value="ID">ID</option>
					<option value="IL">IL</option>
					<option value="IN">IN</option>
					<option value="IA">IA</option>
					<option value="KS">KS</option>
					<option value="KY">KY</option>
					<option value="LA">LA</option>
					<option value="ME">ME</option>
					<option value="MD">MD</option>
					<option value="MH">MH</option>
					<option value="MA">MA</option>
					<option value="MI">MI</option>
					<option value="FM">FM</option>
					<option value="MN">MN</option>
					<option value="MS">MS</option>
					<option value="MO">MO</option>
					<option value="MT">MT</option>
					<option value="NE">NE</option>
					<option value="NV">NV</option>
					<option value="NH">NH</option>
					<option value="NJ">NJ</option>
					<option value="NM">NM</option>
					<option value="NY">NY</option>
					<option value="NC">NC</option>
					<option value="ND">ND</option>
					<option value="MP">MP</option>
					<option value="OH">OH</option>
					<option value="OK">OK</option>
					<option value="OR">OR</option>
					<option value="PW">PW</option>
					<option value="PA">PA</option>
					<option value="PR">PR</option>
					<option value="RI">RI</option>
					<option value="SC">SC</option>
					<option value="SD">SD</option>
					<option value="TN">TN</option>
					<option value="TX">TX</option>
					<option value="UT">UT</option>
					<option value="VT">VT</option>
					<option value="VA">VA</option>
					<option value="VI">VI</option>
					<option value="WA">WA</option>
					<option value="WV">WV</option>
					<option value="WI">WI</option>
					<option value="WY">WY</option>
			</select>
</div>
<div class="form-group">
	<label>Age</label>
			<select class="form-control" id="age" name="age">
					<option value="10">0~10</option>
					<option value="20">11~20</option>
					<option value="30">21~30</option>
					<option value="40">31~40</option>
					<option value="50">41~50</option>
					<option value="60">51~60</option>
					<option value="70">61~70</option>
					<option value="80">71~80</option>
					<option value="81">81~</option>
			</select>
</div>
<div class="text-center">
						<a> <button class="btn btn-primary" type="submit">
					<span class="glyphicon glyphicon-search"></span>&nbsp;Submit</button>
						</a>
</div>
</form>
@endsection('content')