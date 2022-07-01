@extends('admin/layout.layout')


@section('container')

<style>


.invalid-feedback {
    display: block !important;
    width: 100%;
    margin-top: .25rem;
    font-size: 80%;
    color: #dc3545;
}
</style>
 <!-- Breadcubs Area Start Here -->
 <div class="breadcrumbs-area">
    <h3>Reporter Form</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>Reporter Form</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<!-- Admit Form Area Start Here -->
<div class="card height-auto">
<div class="card-body">
<div class="heading-layout1">
    <div class="item-title">
        <h3>Reporter Form</h3>
    </div>
    <div class="dropdown">



    </div>
</div>



<form  enctype="multipart/form-data" method="POST" action="{{ route('reporter.store') }}">

    @csrf


    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" id="email" class="form-control" value="">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Role:</label>
               <select name="role" id="role" class="form-control">

                <option value="reporter">Reporter</option>
                <option value="admin">Admin</option>
               </select>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Password:</label>
                <input type="text" name="password" id="password" class="form-control" value="">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                <label>Confirm Password:</label>
                <input type="text" name="password_confirmation" class="form-control" value="">
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


@endsection
