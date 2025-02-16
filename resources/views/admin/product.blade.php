@extends('admin.admintemplate')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="page-heading text-center pb-5">
                <h2>Products</h2>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="adding-sec">
                <!-- Button for category add modal -->
                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#pro_addModal">
                    Add Product
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-sm align-middle table-bordered border-primary text-center table-striped text-dark">
                  <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">discout_percentage</th>
                        <th scope="col">pro_image</th>
                        <th scope="col">category_id</th>
                        <th scope="col">Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach ($all_products as $all_product)
                    <tr>
                        <td>{{$all_product->pro_name}}</td>
                        <td>{{$all_product->price}}</td>
                        
                        <td>{{$all_product->discout_percentage}}</td>
                        <td><img src="{{asset($all_product->pro_image)}}" alt="" style="height: 120px;width:100px"></td>
                        <td>{{$all_product->category->cat_name}}</td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm pro_up_btn" data-bs-toggle="modal" data-bs-target="#pro_upModal"
                                data-p_name="{{$all_product->pro_name}}"
                                data-p_price="{{$all_product->price}}"
                                data-p_percent="{{$all_product->discout_percentage}}"
                                data-p_image = "{{asset($all_product->pro_image)}}"
                                data-p_category="{{$all_product->category_id}}"
                                data-p_id="{{$all_product->id}}"
                            >
                                Edit
                            </a>
                            <a href="" class="btn btn-danger dprotid btn-sm" data-dpit="{{$all_product->id}}"
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

<!--Product Add Modal -->
<div class="modal fade" id="pro_addModal" tabindex="-1" aria-labelledby="pro_addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <form action="" method="POST" class="product_add_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="pro_addModalLabel">Add Product</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="error-show pt-2 ps-3">

            </div>
            <div class="modal-body">
              <input type="text" class="form-control mb-3" name="pro_names" id="pro_name" placeholder="Product Name">
              <input type="number" class="form-control mb-3" name="pro_price" id="pro_price" placeholder="Product Price">
              <input type="number" class="form-control mb-3" name="pro_discount" id="pro_discount" placeholder="Discount">
              <input type="file" class="form-control mb-3" name="pro_img" id="pro_img" placeholder="Product Image">
              <select class="form-select mb-3" name="pro_catego" aria-label="Default select example">
                <option selected disabled>Select A Category</option>
                @foreach ($geting_cat as $geting_cats)
                <option value="{{$geting_cats->id}}">{{$geting_cats->cat_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary add_product">Save</button>
            </div>
          </div>
      </form>
    </div>
</div>


{{-- product update modal  --}}
<div class="modal fade" id="pro_upModal" tabindex="-1" aria-labelledby="pro_upModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <form action="" method="POST" class="product_up_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="pro_upModalLabel">Add Product</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="errorup-show pt-2 ps-3">

            </div>
            <div class="modal-body">
              <input type="hidden" class="form-control mb-3" name="uppro_id" id="uppro_id">
              <input type="text" class="form-control mb-3" name="uppro_names" id="uppro_name" placeholder="Product Name">
              <input type="number" class="form-control mb-3" name="uppro_price" id="uppro_price" placeholder="Product Price">
              <input type="number" class="form-control mb-3" name="uppro_discount" id="uppro_discount" placeholder="Discount">
              <input type="file" class="form-control mb-3" name="uppro_img" id="uppro_img" placeholder="Product Image">
              <label for="">Current Image</label> <br>
              <img src="" alt="" class="pre_img" style="height: 150px ; width:200px">
              <select class="form-select mb-3 mt-3" name="uppro_catego" aria-label="Default select example" id="options">
                @foreach ($geting_cat as $geting_cats)
                <option value="{{$geting_cats->id}}">{{$geting_cats->cat_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary update_product">Save</button>
            </div>
          </div>
      </form>
    </div>
</div>








@endsection

@include('admin.product_script')