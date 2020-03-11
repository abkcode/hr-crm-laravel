@extends('layouts.app')

@section('title', 'Employees')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-4">
        <h1 class="h3 text-gray-800">Employees</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" style="font-size: 14px">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Job</th>
                            <th>Applied On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee->fname}} {{$employee->lname}}</td>
                            <td>{{$employee->email}}</td>
                            <td>+{{$employee->phone_code}}-{{$employee->phone_number}}</td>
                            <td>{{$employee->job_title}}</td>
                            <td>{{$employee->created_at}}</td>
                            <td>
                                <button class="btn btn-warning btn-view-employee" data-id="{{$employee->id}}">View</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="clearfix">
                <div class="float-left">
                   Showing {{ $startIndex }} to {{ $endIndex }} of {{ $employees->total() }}
                </div>
                <div class="float-right">
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-view-employee" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Employee Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
    </div>
  </div>
</div>

@endsection

@section('page_scripts')
<script src="{{ asset('js/employees.js') }}"></script>
@endsection