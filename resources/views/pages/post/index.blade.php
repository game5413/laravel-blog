@extends('layouts.main.app')

@push('defer')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('js/pages/post/index.js') }}" defer></script>
@endpush

@push('styles')
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 px-0">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('posts.create') }}" role="button" class="btn btn-primary float-right mb-3">Create New</a>
                    <table id="post_table" class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Latest Modify</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->category }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->updated_at }}</td>
                                    <td>{{ $post->status }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <form id="delete-form" method="POST">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        window.editURI = '{!! route("posts.edit", ["id" => ":id"]) !!}';
        window.destroyURI = '{!! route("posts.destroy", ["id" => ":id"]) !!}';
    </script>    
@endpush
