@extends('layouts.main')
@section('content')
<div class="about-area">
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12">
                <!-- Trending Tittle -->
                <div class="about-right mb-90">
                    <div class="about-img">
                        <img src="{{ url('../storage/app/public/'.$news->image) }}" style="width:50%" class="img-fluid" alt="">
                    </div>
                    <div class="section-tittle mb-30 pt-30">
                        <h3>{{ $news->title }}</h3>
                    </div>
                    <div class="about-prea">
                        <p class="about-pera1 mb-25">
                           {{ $news->description }}</p>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    
        


