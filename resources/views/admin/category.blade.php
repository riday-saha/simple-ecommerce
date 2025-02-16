@extends('admin.admintemplate')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-heading text-center pb-5">
                    <h2>All Category</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="adding-sec">
                    <!-- Button for category add modal -->
                    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#cat_addModal">
                        Add Category
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm align-middle table-bordered border-primary text-center table-striped text-dark">
                      <thead>
                        <tr>
                            <th scope="col">Category Name</th>
                            <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($all_category as $all_categories)
                        <tr>
                            <td>{{$all_categories->cat_name}}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm cat_up_btn" data-bs-toggle="modal" data-bs-target="#cat_upModal"
                                    data-cid="{{$all_categories->id}}"
                                    data-cname="{{$all_categories->cat_name}}"
                                >
                                    Edit
                                </a>
                                <a href="" class="btn btn-danger dcatid btn-sm"
                                data-dit="{{$all_categories->id}}"
                                >Delete</a>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Category Add Modal -->
    <div class="modal fade" id="cat_addModal" tabindex="-1" aria-labelledby="cat_addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="post" class="cat_addform">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cat_addModalLabel">Add Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="error_show pt-4 ps-3">

                    </div>
                    <div class="modal-body">
                     <input type="text" class="form-control" id="catego_name" placeholder="Category Name">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary add_category">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--Category Update Modal -->
    <div class="modal fade" id="cat_upModal" tabindex="-1" aria-labelledby="cat_upModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="post" class="cat_upform">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cat_upModalLabel">Update Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="up_error_show pt-4 ps-3">

                    </div>
                    <div class="modal-body">
                     <input type="text" class="form-control" id="up_catego_name">
                     <input type="hidden" id="up_catego_id">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary upc_category">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@include('admin.category_script')