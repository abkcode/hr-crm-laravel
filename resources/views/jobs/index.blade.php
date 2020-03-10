@extends('layouts.app')

@section('title', 'Jobs')

@section('page_styles')
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-4">
        <h1 class="h3 text-gray-800">Jobs</h1>
        <a class="btn btn-primary" href="{{ url('/jobs/create') }}">Add Job</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Experience</th>
                            <th>Location</th>
                            <th>Posted On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job)
                        <tr>
                            <td>{{$job->title}}</td>
                            <td>{{$job->experience}}</td>
                            <td>{{$job->location}}</td>
                            <td>{{$job->created_at}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ url('/jobs/edit/'.$job->id) }}">Edit</a>
                                <form action="{{ url('/jobs/destroy/'.$job->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="clearfix">
                <div class="float-left">
                   Showing {{ $startIndex }} to {{ $endIndex }} of {{ $jobs->total() }}
                </div>
                <div class="float-right">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('page_scripts')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
@endsection