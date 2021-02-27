@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <a href="{{route('file.create')}}">Add a file</a>
    <table class="table table-respoonsive table-bordered mb-5" >
        <thead>
            <tr class="table-success">
                <th>File Name</th>
                <th>Size (MB)</th>
                <th>File Format</th>
                <th>Date Uploaded</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($files as $file)
                <tr>
                    <td>{{$file->name}}</td>
                    <td>{{$file->file_size ? $file->file_size : ''}}</td>
                    <td>{{$file->file_format ? $file->file_format: ''}}</td>
                    <td>{{$file->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="" class="btn btn-primary">View</a>
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>

    <div class="d-flex justify-content-center">

    </div>
    {{$files->links()}}
</div>
@endsection
