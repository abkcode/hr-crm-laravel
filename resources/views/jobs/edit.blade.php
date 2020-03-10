@extends('layouts.app')

@section('title', 'Edit Jobs')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-4">
        <h1 class="h3 text-gray-800">Edit Jobs</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form method="post" action="{{ url('/jobs/update/'.$job->id) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputTitle">Title</label>
                    <input type="text" class="form-control" id="inputTitle" name="title" value="{{ $job->title }}">
                </div>
                <div class="form-group">
                    <label for="inputExperience">Experience</label>
                    <input type="number" class="form-control" id="inputExperience" name="experience" value="{{ $job->experience }}">
                </div>
                <div class="form-group">
                    <label for="inputLocation">Location</label>
                    <input type="text" class="form-control" id="inputLocation" name="location" value="{{ $job->location }}">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
@endsection