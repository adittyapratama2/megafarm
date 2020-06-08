@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @foreach ($users as $data)
                          <tr>
                          <th scope="row">{{$no++}}</th>
                            <td>{{$data->name}}</td>
                            <td>{{$data->username}}</td>
                            <td>{{ implode(', ', $data->roles()->get()->pluck('name')->toArray()) }}</td>
                            <td>
                                <a href="{{route('admin.users.edit', $data->id)}}"><button type="button" class="btn btn-warning float-left">Edit</button></a>
                                <form action="{{ route('admin.users.destroy', $data) }}" method="POST" class="float-left">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
