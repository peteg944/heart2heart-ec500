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
								<div class="form-group1">
									<label>Gender</label>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Male
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Female
										</label>
									</div>
								</div>
<div class="form-group">
	<label>State</label>
			<select class="form-control">
					<option>AL</option>
					<option>AK</option>
					<option>AS</option>
					<option>AZ</option>
					<option>AR</option>
					<option>CA</option>
					<option>CO</option>
					<option>CT</option>
					<option>DE</option>
					<option>DC</option>
					<option>FL</option>
					<option>GA</option>
					<option>GU</option>
					<option>HI</option>
					<option>ID</option>
					<option>IL</option>
					<option>IN</option>
					<option>IA</option>
					<option>KS</option>
					<option>KY</option>
					<option>LA</option>
					<option>ME</option>
					<option>MD</option>
					<option>MH</option>
					<option>MA</option>
					<option>MI</option>
					<option>FM</option>
					<option>MN</option>
					<option>MS</option>
					<option>MO</option>
					<option>MT</option>
					<option>NE</option>
					<option>NV</option>
					<option>NH</option>
					<option>NJ</option>
					<option>NM</option>
					<option>NY</option>
					<option>NC</option>
					<option>ND</option>
					<option>MP</option>
					<option>OH</option>
					<option>OK</option>
					<option>OR</option>
					<option>PW</option>
					<option>PA</option>
					<option>PR</option>
					<option>RI</option>
					<option>SC</option>
					<option>SD</option>
					<option>TN</option>
					<option>TX</option>
					<option>UT</option>
					<option>VT</option>
					<option>VA</option>
					<option>VI</option>
					<option>WA</option>
					<option>WV</option>
					<option>WI</option>
					<option>WY</option>
			</select>
</div>
<div class="form-group">
	<label>Age</label>
			<select class="form-control">
					<option>0~10</option>
					<option>11~20</option>
					<option>21~30</option>
					<option>31~40</option>
					<option>41~50</option>
					<option>51~60</option>
					<option>61~70</option>
					<option>71~80</option>
					<option>81~</option>
			</select>
</div>
<div class="text-center">
						<a>
							<button class="btn btn-primary" type="button"><span class="
glyphicon glyphicon-search"></span>&nbsp;Submit</button>
						</a>
					</div>
@endsection('content')