
@extends('admin/layout.layout')


@section('container')


<style>
    .fas.fa-play.fa-fw {z-index: 9999;cursor: pointer;}

.fas.fa-pause.fa-fw {z-index: 9999;cursor: pointer;}
.fas.fa-volume-up.fa-fw {z-index: 9999;cursor: pointer;}
.fas.fa-stop.fa-fw {z-index: 9999;cursor: pointer;}
.fas.fa-times.fa-fw {
    z-index: 1;
    cursor: pointer;
    position: absolute;
    right: 13px;
    top: 31%;
}

.iru-tiny-player .song-volume-control {
    z-index: 9999 !important;
}

</style>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="{{ asset('css/image-uploader.min.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('css/tinyPlayer.min.css') }}">



 <!-- Breadcubs Area Start Here -->
 <div class="breadcrumbs-area">
    <h3>Report Files</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>Report Files</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<!-- Admit Form Area Start Here -->
<div class="card height-auto">
<div class="card-body">
<div class="heading-layout1">
    <div class="item-title">
        <h3>Report Files</h3>
    </div>
    <div class="dropdown">



    </div>
</div>




    <div class="row">

<?php
    $reportFiles = json_decode($report->files);
    ?>
    @foreach ($reportFiles as $row)
        @php

         $fileExts = explode('.',$row->file);

        $filenameimage = filesext($fileExts[1]);
        @endphp

        <div class="col-6 col-sm-4 col-md-4 col-xl-3 ">
            <div class="filePreview">
                @if($filenameimage=='')
                <img style="width:100% !important;height:100% !important" src="{{ asset('storage/report/'.$row->file) }}" alt="">


                @elseif($filenameimage=='https://us.123rf.com/450wm/martialred/martialred1701/martialred170100048/70075273-sound-audio-wave-or-soundwave-line-art-vector-icon-for-music-apps-and-websites.jpg?ver=6')
                {{-- <img style="width:100% !important;height:100% !important" src="{{ $filenameimage }}" alt=""> --}}
            <audio id="myAudio{{ $loop->index }}" class="iru-tiny-player" data-title="Sample Audio File" controls>
                    <source src="{{ asset('storage/report/'.$row->file) }}" type="audio/ogg">
                    <source src="{{ asset('storage/report/'.$row->file) }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                  </audio>


                @elseif($filenameimage=='https://blog.majestic.com/wp-content/uploads/2010/10/Video-Icon-crop.png')
                {{-- <img style="width:100% !important;height:100% !important" src="{{ $filenameimage }}" alt=""> --}}
                <video width="100%"  controls>
                    <source src="{{ asset('storage/report/'.$row->file) }}" type="video/mp4">
                    <source src="{{ asset('storage/report/'.$row->file) }}" type="video/ogg">
                  Your browser does not support the video tag. <!-- Text to be shown incase browser doesnt support html5 -->
                  </video>




                {{-- <button onclick="playAudio('myAudio{{ $loop->index }}')" type="button">Play Audio</button>
                <button onclick="pauseAudio('myAudio{{ $loop->index }}')" type="button">Pause Audio</button> --}}
                @else
                <img style="width:100% !important;height:100% !important" src="{{ $filenameimage }}" alt="">
                @endif

        </div>
        <div class="filedownload">

            <a href="{{ asset('storage/report/'.$row->file) }}" class="btn btn-danger" download="{{ $row->file }}">Download</a>
        </div>
        </div>

        @endforeach


    </div>







</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.0.13/howler.min.js"></script>
<script src="{{ asset('js/tinyPlayer.min.js') }}"></script>

<script>


    function playAudio(id) {
        var x = document.getElementById(id);
      x.play();
    }

    function pauseAudio(id) {
        var x = document.getElementById(id);
      x.pause();
    }
    </script>

@endsection
