@extends("layout.AdminLayout")



@section("content")
<main id="main" class="main">
<form action="{{ route('admin.store-product') }}" method="Post" enctype="multipart/form-data">

@csrf
        <!-- Form Name -->
        <legend>PRODUCTS</legend>

        <!-- Text input-->


        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>
          <div class="col-md-4">
          <input id="product_name" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">

          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="product_name_fr">PRODUCT DESCRIPTION</label>
          <div class="col-md-4">
          <input id="product_name_fr" name="product_description" placeholder="PRODUCT DESCRIPTION" class="form-control input-md" required="" type="text">

          </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="product_category">PRODUCT CATEGORY</label>
          <div class="col-md-4">
            <select id="product_category" name="product_category" class="form-control">
                @if($category)
                @foreach($category as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>

                @endforeach
                @endif
            </select>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="available_quantity">AVAILABLE QUANTITY</label>
          <div class="col-md-4">
          <input id="available_quantity" name="available_quantity" placeholder="AVAILABLE QUANTITY" class="form-control input-md" required="" type="text">

          </div>
        </div>






        <div class="form-group">
            <label class="col-md-4 control-label" for="available_quantity">Status</label>
            <div class="col-md-4">
                <select id="status" name="status" class="form-control input-md">
                <option value="Active">Active</option>
<option value="InActive">InActive</option>
                </select>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="available_quantity">Main Image</label>
                    <div class="col-md-4">
                        <input type="file" name="main_image" id="main_image" class="form-control input-md">

            </div>
          </div>




          <div class="form-group">
            <label class="col-md-4 control-label" for="available_quantity">Other Media</label>
            <div class="col-md-4">
                <input type="file" name="other_media[]" id="other_media" multiple class="form-control input-md">

    </div>
  </div>


  <div class="form-group">
    <label class="col-md-4 control-label" for="available_quantity">Price</label>
    <div class="col-md-4">
        <input type="number" name="price" id="price" class="form-control input-md">

</div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</main>
@endsection
