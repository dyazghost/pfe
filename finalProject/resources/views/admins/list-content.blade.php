@extends('adminLayout')
@section('adminContent')
<div class="container">

    <div class="row justify-content-center mt-sm-5 mb-sm-5">
        <h3>Contents</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-offset-2" style="margin-bottom:174px;">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Content</th>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th style="text-align: center; vertical-align: middle;">Branches</th>
                            <td style="text-align: center; vertical-align: middle;">
                                <a href="{{ route('content-list-branches') }}" class="btn btn-outline-info" role="button">List</a>
                                </td>
                        </tr>
                        <tr>
                            <th style="text-align: center; vertical-align: middle;">Sub Branches</th>
                            <td style="text-align: center; vertical-align: middle;">
                                <a href="{{ route('content-list-subbranches') }}" class="btn btn-outline-info" role="button">List</a>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align: center; vertical-align: middle;">Courses</th>
                            <td style="text-align: center; vertical-align: middle;">
                                <a href="{{ route('content-search-courses') }}" class="btn btn-outline-info" role="button">List</a>
                            </td>
                        </tr>

                        <tr>
                            <th style="text-align: center; vertical-align: middle;">Diplomas</th>
                            <td style="text-align: center; vertical-align: middle;">
                                <a href="{{ route('list-diplomas') }}" class="btn btn-outline-info" role="button">List</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection