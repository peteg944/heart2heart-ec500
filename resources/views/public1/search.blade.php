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
<div>
         <h1>All related files are listed below</h1>
<table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>
                    actual_edv</th>
                    <th>actual_esv</th>
                    <th>ef</th>
                </tr>
                </thead>
                <tbody>
 
                <!-- 二维数组输出表格 -->
                <?php
                    foreach($dicoms as $dicom => $value){
                ?>
                <tr>
                    <td>
                        <?php
                           echo $value['actual_edv'];
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $value['actual_esv'];
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $value['ef'];
                        ?>
                    </td>
                </tr>
                <?php
                    }
                ?>
 
                </tbody>
            </table>
@endsection('content')