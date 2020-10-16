@extends('adminLayout')
@section('adminContent')
<div class="container">
    @if(\Session::has('diploma_success'))
        <div class="row justify-content-center m-sm-3">
            <p class="text-success">Diploma is edited successfully!</p>
        </div>
    @endif
    <div class="row justify-content-center mt-sm-5 mb-sm-5">
        <h3>Courses list: </h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-offset-2" style="margin-bottom:240px;margin-top:70px;">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Diplomas</th>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($diplomas as $diploma)
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">{{ $diploma->diploma_name}}</td>
                            <td style="text-align: center; vertical-align: middle;">
                                <a href="{{ route('edit-diploma', $diploma->id) }}" class="btn btn-outline-danger"
                                    role="button">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection