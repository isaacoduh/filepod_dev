@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>Name</td>
                            <td>{{$file->name}}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{$file->description ? $file->description : ''}}</td>
                        </tr>
                        <tr>
                            <td>Format</td>
                            <td>{{$file->file_format ? $file->file_format : ''}}</td>
                        </tr>
                        <tr>
                            <td>Path</td>
                            <td>{{$file->file_path ? $file->file_path : ''}}</td>
                        </tr>
                        <tr>
                            <td>Size (MB)</td>
                            <td>{{$file->file_size ? $file->file_size : ''}}</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a type="button" href="{{route('file.download',['id' => $file->id])}}" class="btn btn-success" data-bs-toggle="tooltip"><i class="cil-cloud-download 3x"></i></a>
                <a type="button" href="{{route('file.edit',['id' => $file->id])}}" class="btn btn-primary"><i class="cil-clipboard"></i></a>
                <form action="{{ route('file.destroy', $file->id) }}" method="POST">



                    @csrf
                    @method('DELETE')

                    <button type="submit" title="delete" class="btn btn-danger">
                        <i class="cil-trash"></i>

                    </button>
                </form>
                {{-- <a type="button" href="{{route('file.destroy',['id' => $file->id])}}" class="btn btn-danger"><i class="cil-trash"></i></a> --}}
            </div>
        </div>
    </div>
</div>
@endsection
