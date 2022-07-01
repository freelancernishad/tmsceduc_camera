@extends('admin/layout.layout')


@section('container')
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="{{ asset('css/image-uploader.min.css') }}">



 <!-- Breadcubs Area Start Here -->
 <div class="breadcrumbs-area">
    <h3>Report Form</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>Report Form</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<!-- Admit Form Area Start Here -->
<div class="card height-auto">
<div class="card-body">
<div class="heading-layout1">
    <div class="item-title">
        <h3>Report Form</h3>
    </div>
    <div class="dropdown">



    </div>
</div>



<form  enctype="multipart/form-data" method="POST" action="{{ route('report.store') }}">

    @csrf

    <input type="text" name="reporter_id" value="{{ Auth::user()->id }}">

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="Name" class="form-control" value="{{ Auth::user()->name }}">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Upload File:</label>
                <div class="input-images"></div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Description:</label>
                <textarea name="description" id="description" cols="30" rows="4" class="form-control" style="height: 100px;resize:none"></textarea>
            </div>
        </div>


        <div class="col-md-12" >
            <div class="form-group">

                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">SAVE DATA</button>


                {{-- <input class="btn btn-info" type="submit" value="SAVE DATA" id="submit" /> --}}
            </div>
        </div>





    </div>



</form>





</div>
</div>

<script type="text/javascript" src="{{ asset('js/image-uploader.min.js') }}"></script>

<script>
    $('.input-images').imageUploader();
</script>

@endsection
