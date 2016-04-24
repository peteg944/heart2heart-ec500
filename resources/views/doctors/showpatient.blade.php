@extends('layouts.doctorarea')

@section('content_patient')  
<h2><img src="/img/person-placeholder.png">{{ $selected->firstname.' '.$selected->lastname }}</h2>
<div class="row">
    <div class="col-xs-12 col-s-6 col-md-6">
        <table class="table">
            <tr><td>Date of birth:</td><td>{{ $months[$selected->dob_month].' '.$selected->dob_day.', '.$selected->dob_year }}</td></tr>
            <tr><td>Gender:</td><td>{{ $selected->gender }}</td></tr>
            <tr><td>Phone number:</td><td>{{ $selected->phone }}</td></tr>
            <tr><td>Home address:</td><td>{{ $selected->address }}</td></tr>
        </table>
    </div>
</div>
<div class="row"><!-- upload file -->
    <div class="col-xs-12 col-s-6 col-md-6">
        @if($dicom_data)
            <h4>DICOM results</h4>
            <p>EF: {{ $dicom_data->ef }}</p>
            <p>Predicted diastolic volume: {{ $dicom_data->predicted_edv }}</p>
            <p>Predicted systolic volume: {{ $dicom_data->predicted_esv }}</p>
            <a href="{{ url('/deletedicom/'.$selected->id) }}" id="delete-dicom-link">Delete this entry</a>
        @else
            <h4>Upload a DICOM file</h4>
            <form action="{{ url('/uploaddicom/'.$selected->id) }}" enctype="multipart/form-data" method="POST" class="dropzone" id="zipfileUpload">
                {!! csrf_field() !!}
            </form>
        @endif
    </div>
</div>
@endsection('content_patient')

@section('content_bottom')
<script src="/js/dropzone.js"></script>
<script>   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    // Dropzone
    Dropzone.options.zipfileUpload = {
        paramName: "zipfile",
        uploadMultiple: false,
        acceptedFiles: "application/zip",
        maxFiles: 1,
        init: function() {
            this.on("success", function(e, response) {
                // Do not allow to upload more than once
                this.disable();
                location.reload(true);
            });
            this.on("dragover", function(e) {
                zipfileUpload.style.backgroundColor = "#fee";
            });
            this.on("dragleave", function(e) {
                zipfileUpload.style.backgroundColor = "#fff";
            });
        }
    };

    $("#delete-dicom-link").click(function(event) {
        event.preventDefault(); // do not actually go to the link
        $.ajax({
            type: "DELETE",
            url: $(this).attr('href'),
        })
        .done(function(jsonResult) {
            //alert(jsonResult.message);
            location.reload(true);
        });
    });
</script>
@endsection('content_bottom')