@extends('layouts.patientarea')

@section('tabactive-profile', 'class="active"')
@section('content')
<div class="contact_desc">
		        <div class="container">
			         <div class="contact-form">
				  	   <h2>Contact Us</h2>
					     <form method="post" action="contact-post.html" class="left_form">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input name="userName" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input name="userEmail" type="text" class="textbox"></span>
						    </div>
						    <div>
						     	<span><label>Fax</label></span>
						    	<span><input name="userPhone" type="text" class="textbox"></span>
						    </div>
					    </form>
					    <form class="right_form">
					        <div>					    	
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea name="userMsg"> </textarea></span>
						    </div>
						   <div>
						   		<a class="contactbutton">
									<button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Submit</button>
								</a>						  
							</div>
					    </form>
					    <div class="clearfix"></div>
				  </div>
	             </div>  
	          </div> 
@endsection('content')