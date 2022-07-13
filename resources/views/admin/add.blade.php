@extends('admin.layouts.main')
@section('content')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<div class=" mt-4">
    <h1 class="h3 mb-4 text-gray-800" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
       NEWSMASTER
    </h1>
   
    <div class="card shadow mt-4 mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add News</h6>
        </div>
        <div class="card-body">
           <div class="row">
               <div class="col-md-12">

                <div class="mb-2">
                    @if (count($errors) > 0)
                        <div class = "alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                   </div>

                <form action="{{ url('news/add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for=""> Title </label>
                        <input type="text" name="title" placeholder="Enter title" required class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for=""> Category </label>
                        <select name="category" class="form-control" required id="">
                            <option value="entertainment">Entertainment</option>
                            <option value="sports">Sports</option>
                            <option value="international">International</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for=""> Thumbnail </label>
                        <input type="file" name="image" required class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for=""> Description </label>
                        <textarea name="description" id="" cols="30" rows="5" required class="form-control"></textarea>
                    </div>
                    <div>
                        <button 
                            type="submit" 
                            class="btn bg-gradient-primary btn-lg btn-block" 
                            style="color: white"
                            onclick="return confirm('Are you sure you want to submit?');" 
                        >
                            Submit
                        </button>
                    </div>
                </form>
               </div>
           </div>

           

        </div>
    </div>
</div>



@endsection

      
