@extends('layouts.main')
@section('content')

<section class="whats-news-area pt-50 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-3 col-md-3">
                        <div class="section-tittle mb-30">
                            <h3>All News</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="whats-news-caption">
                            <div class="row" >
                                @foreach ($news as $new)
                                <div class="col-lg-3 col-md-3">
                                    <div class="single-what-news mb-100">
                                        <div class="what-img">
                                            <img src="{{ \Illuminate\Support\Facades\Storage::disk('local')->url($new->image) }}" alt="">
                                        </div>
                                        <div class="what-cap">
                                            <h4><a href="{{ route('news.detail',['id'=>$new->id]) }}">{{ $new->title }}</a></h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
           <center> <button style="border:1px white; background:green" id="loadnews">Load All news</button></center><br><br>
           <div>
               <ol id="news" class="list">

               </ol>
           </div>
        </div>
    </div>

    <script>
        var loadMoreUrl = '{{route('loadnews')}}';
        document.getElementById('loadnews').addEventListener('click', function(){
            fetch(loadMoreUrl)
            .then(res => res.json())
            .then((data)=> {
                for(let d of data){
                    let newss = document.getElementById('news');
                    let createLi = document.createElement('li');
                    let createText = document.createTextNode(d.title);
                    createLi.appendChild(createText);
                    newss.appendChild(createLi);
                }
            })
        })
    </script>

</section>

@endsection()
