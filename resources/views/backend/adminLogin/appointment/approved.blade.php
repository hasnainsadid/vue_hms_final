@extends('backend.adminLogin.layouts.app')
@section('title', 'Approved Appointments')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Approved Appointments</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('appointment.index')}}">View Appointments</a></li>
            <li class="breadcrumb-item active">Approved Appointments</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover text-center">
                <thead>
                  <tr>
                    <th style="width: 1.3rem;">Sl No</th>
                    <th>Patient's Name</th>
                    <th>Doctor's Name</th>
                    <th>Date</th>
                    <th>Reason</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @php($i = 1)
                  @forelse ($appointment as $item)
                  <tr>
                    <td style="width: 1.3rem;">{{$i++}}</td>
                    <td>{{$item->patient->name}}</td>
                    <td>{{$item->doctor->name}}</td>
                    <td>{{$item->date}}</td>
                    <td>{{$item->reason}}</td>
                    <td>{{$item->status == 1 ? 'Approved' : 'Pending'}}</td>
                  </tr>
                  @empty
                  <h3 class="bg-danger p-2">No data Entry</h3>
                  @endforelse
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection