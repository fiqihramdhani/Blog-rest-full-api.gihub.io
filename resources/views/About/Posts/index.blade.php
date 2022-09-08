@extends('Dashboard.Layout.Main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> My Post </h1>
    </div>

    @if (session()->has('success'))
        <div class="col-lg-12">
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="table-responsive">
        <a href="/Dashboard/About/Posts/create" class="btn btn-primary mb-2">Create New Post+</a>
        <table class="table table-striped table-lg">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Post as $Posts)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $Posts->Title }}</td>
                        <td>{{ $Posts->Category->Nama }}</td>
                        <td class="d-flex px-2">
                            <a href="/Dashboard/About/Posts/{{ $Posts->slug }}" class="badge bg-info"><span
                                    data-feather="eye"></span></a>
                            <a href="/Dashboard/About/Posts/{{ $Posts->slug }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>

                            <form action="/Dashboard/About/Posts/{{ $Posts->slug }}" method="Post" class="d-flex">

                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                                        data-feather="x-circle"></span></button>

                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
