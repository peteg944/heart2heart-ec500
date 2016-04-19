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
        <h4>Upload a DICOM file</h4>
        <form action="upload.php" enctype="multipart/form-data" class="dropzone" id="zipfileUpload">
        </form>
    </div>
</div>
@endsection('content_patient')

@section('content_bottom')
    <script src="/js/dropzone.js"></script>
    <script>        
        // Dropzone
        Dropzone.options.zipfileUpload = {
            paramName: "zipfile",
            uploadMultiple: false,
            acceptedFiles: "application/zip",
            init: function() {
                this.on("success", function(e, response) {
                    // Hide the image uploader and show the progress thing
                    zipfileUpload.style.display = "none";
                    progressMessage.style.display = "inline";
                    loadImage(response);
                });
                
                this.on("dragover", function(e) {
                    zipfileUpload.style.backgroundColor = "#fee";
                });
                
                this.on("dragleave", function(e) {
                    zipfileUpload.style.backgroundColor = "#fff";
                })
            }
        };
    </script>
@endsection('content_bottom')