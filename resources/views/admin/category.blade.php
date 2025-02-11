@extends('admin.admintemplate')

@section('content')
    <h2></h2>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-sm align-middle table-bordered border-primary text-center table-striped text-dark">
                      <thead>
                        <tr>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>ABC</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm">Edit</a>
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>ABC</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm">Edit</a>
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
@endsection