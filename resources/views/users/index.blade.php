@extends('layouts.master')
@section('title', 'Pengguna')

@section('content')
<!-- Content Header (Page header) -->
  @include('users.header')
<!-- /.content-header -->
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>Nama</th>
                <th>E-Mail</th>
                <th>Hak Akses</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              @foreach($user->roles as $role)
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ucfirst(trans("$role->name"))}}</td>
                <td>
                  <a class="btn btn-primary btn-sm" href="{{ route('user.show',$user->id) }}">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a class="btn btn-info btn-sm" href="{{ route('user.edit',$user->id) }}">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                </td>
                  {{--  <form action="{{ route('user.destroy', $user->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin ingin menghapus User Ini ?')">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </td>  --}}
              </tr>
              @endforeach
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
@endsection