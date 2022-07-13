@extends('admin.layouts.main')
@section('content')
    <div class="card shadow mb-4">
        @if (session('msg'))
            <span class="mt-2 alert alert-success"> {{ session('msg') }} </span>
        @endif
        <div class="card-header py-3">
            <a href="{{ url('news/add') }}" class="btn bg-gradient-primary" style="float:right;color: white"> Add News </a>
        <h6 class="m-0 font-weight-bold text-primary">All News</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Sr.#</th>
                        <th>News</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; ?>
                   @foreach ($news as $new)
                   <tr>
                        <?php $i++; ?>
                        <td>{{$i }}</td>
                        <td>{{ $new->title }}</td>
                        <td>{{ $new->category }}</td>
                        <td>
                            <a href="{{ url('removenews/'.$new->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                   </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection