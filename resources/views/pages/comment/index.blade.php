@extends('layouts.main.app')

@push('defer')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('js/pages/comment/index.js') }}" defer></script>
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
                    <table id="comment_table" class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Post</th>
                                <th>Comment</th>
                                <th>Latest Modify</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->post }}</td>
                                    <td>{{ $comment->body }}</td>
                                    <td>{{ $comment->updated_at }}</td>
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
        window.destroyURI = '{!! route("comments.destroy", ["id" => ":id"]) !!}';
    </script>    
@endpush
