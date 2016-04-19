@extends('layouts.app')

@section('title', 'Heart2Heart')
@section('body_id', 'body-homepage')
@section('content')
<div class="jumbotron" id="jumbotron-homepage">
    <header class="container" id="header-homepage">
        <img class="logo" src="/img/heart.png">
            <h2>Real-time cardiac analysis for doctors.</h2>
            <h2>Fast, relevant information for patients.</h2>
    </header>
    <div class="container" id="container-jumpoff">
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <a href="/doctor" class="jumpoff-link">
                <p><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>&nbsp;Doctors &raquo;</p>
                </a>
            </div>
            <div class="col-xs-12 col-md-4">
                <a href="/patients/profile.php" class="jumpoff-link">
                <p><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Patients &raquo;</p>
                </a>
            </div>
            <div class="col-xs-12 col-md-4">
                <a href="/public.php" class="jumpoff-link">
                <p><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Public &raquo;</p>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="service">
        <img src="/img/doctor-2.jpg" alt="Doc">
        <h3>Dr. Smith, Cardiologist</h3>
        <p>I've been working in cardiology for many years. Calculating the end-diastolic and end-systolic volumes of the left ventricle of the heart from a cardiac MRI has always been a tedious job for cardiologists. One of my colleagues referred me to <em>Heart2Heart</em>, a website that can help us solve this problem and save a lot of time. It also provides an area for patients to see their information and contact their doctors. Answering patients' questions in H2H has been a pleasurable experience. Highly recommend.&nbsp;&nbsp;<a href="/doctor" class="btn btn-default">Upload your MRIs &raquo;</a></p>
    </div>
    <div class="service service-alternate">
        <img src="/img/patient.jpg" alt="Patient">
        <h3>George Papadopoulos, diagnosed with heart disease 1 month ago</h3>
        <p>Several weeks ago I felt pain in my chest. Even with my leg problem, I had to go all the way to the nearest hospital to get pictures taken of my heart, which the local doctor called MRI. However, I can get more information only if I go to the downtown hospital which is so far away for the disabled like me. Fortunately, I searched on the internet and found the <em>Heart2Heart</em> website. On this site I can upload my MRI from my own home and  medical professionals will give me advice. Thank god for this website, I am very grateful.&nbsp;&nbsp;<a href="/patient" class="btn btn-default">View your MRI results &raquo;</a>
        </p>
    </div>
    <div class="service">
        <img src="/img/classroom.jpg" alt="Research">
        <h3>Jane Doe, statistics student at Boston University </h3>
        <p>I am a statistics student at Boston University and my professor, Osama, has given me a project where I have to create a report on the relationship between left ventricle heart volume and heart disease. Osama is a good professor and every student loves him so much. But, oh my gosh, this topic is so medical and do I really have to go to every hospital in Boston to ask them for heart disease data? When I had packed all of my things and was ready to start my "hospital trip", I received an advertisement email from the <em>Heart2Heart</em> website and surprisingly found that they have all the data I need! <em>Heart2Heart</em> saved me a lot of time and is very convenient for classifying the data I need. I have finished my project and got an A from Prof. Osama so I want to show my thanks to <em>H2H</em> again. Useful website!&nbsp;&nbsp;<a class="btn btn-default">Download our public data &raquo;</a>
        </p>
    </div>
</div>
@endsection('content')