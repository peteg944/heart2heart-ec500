@extends('layouts.app')

@section('title', 'About Us - Heart2Heart')
@section('content')
<div class="jumbotron" id="jumbotron-aboutpage">
    <div class="container">
        <h1 class="text-center">What is heart disease?</h1>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <p>Heart disease describes a range of conditions that affect your heart. Diseases under the heart disease umbrella include blood vessel diseases, such as coronary artery disease; heart rhythm problems (arrhythmias); and heart defects you're born with (congenital heart defects), among others.</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <article class="text-center">
        <p class="lead">We all have a heart. It’s our heart that gives us the moments in life to imagine, create and discover.</p>
        <p>However, cardiovascular disease threatens to all of these movements. And most cardiovascular disease affects older adults. The average age of death from cardiovascular disease in the developed world is around 80 while it is around 68 in the developing world. Therefore, to help more people live longer and enjoy their lives, we can use data science to help doctors work more efficiently, diagnose heart conditions early, and give the advice of cardiovascular disease treatment.</p>
    </article>
    <div class="row" id="why-us-pictures">
        <div class="col-md-5 col-md-offset-1">
            <img src="/img/Heart-Failure.jpg" width="100%" height="100%">
        </div>
        <div class="col-md-5">
            <img src="/img/Know-Your-Risk-for-Cardiovascular-Disease.jpg" width="100%" height="100%">
        </div>
    </div>
</div>
<article class="text-center" id="why-us">
    <div class="container">
        <h2>What Can We Do?</h2>
        <div class="row">
            <div class="col-md-4">
                <span class="circle">For Doctor</span>
                <p>Upload or search patients' video</p>
                <p>Get results in numbers</p>
                <p>Contact patients</p>
            </div>
            <div class="col-md-4">
                <span class="circle">For Patient</span>
                <p>Upload your video and get the results</p>
                <p>Get recommendations according to the results</p>
                <p>Contact doctors</p>
            </div>
            <div class="col-md-4">
                <span class="circle">For Public</span>
                <p>Search for classified patients samples</p>
                <p>Get the data from the samples</p>
                <p>Get the diagnosis results from doctor</p>
            </div>
        </div>
    </div>
</article>
<article class="text-center" id="profilepics">
	<h2>Team Members</h2>
	<div class="row">
		<ul class="ch-grid">
			<li><div class="ch-item ch-img-1"><div class="ch-info"><h4>Ye Xing</h4></div></div></li>
			<li><div class="ch-item ch-img-2"><div class="ch-info"><h4>Peter Goulakos</h4></div></div></li>
			<li><div class="ch-item ch-img-3"><div class="ch-info"><h4>Ziyu He</h4></div></div></li>
			<li><div class="ch-item ch-img-4"><div class="ch-info"><h4>Lan Yao</h4></div></div></li>
			<li><div class="ch-item ch-img-5"><div class="ch-info"><h4>Lan Luo</h4></div></div></li>
		</ul>
	</div>
</article>
@endsection('content')