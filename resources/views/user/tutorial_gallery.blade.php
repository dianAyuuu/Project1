@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-4">Tutorial Galeri</h2>
        <div id="thumbnail-container" class="row">
            {{-- Loop through videos --}}
            @foreach ($videos as $video)
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="{{ $video }}" alt="Video Thumbnail" class="img-thumbnail">
                        <div class="thumbnail-title">Videos Tutorial</div>
                    </div>
                </div>
            @endforeach

            {{-- Loop through PDFs --}}
            @foreach ($pdfs as $pdf)
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="{{ $pdf }}" alt="PDF Thumbnail" class="img-thumbnail">
                        <div class="thumbnail-title">PDFs Tutorial</div>
                    </div>
                </div>
            @endforeach

            {{-- Loop through PPTs --}}
            @foreach ($ppts as $ppt)
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="{{ $ppt }}" alt="PPT Thumbnail" class="img-thumbnail">
                        <div class="thumbnail-title">PPTs Tutorial</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
