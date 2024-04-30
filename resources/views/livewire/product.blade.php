<div>
    <form wire:submit.prevent="store">
<div class="form-group">
    <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>
    <div class="col-md-4">
    <input id="product_name" wire:model="product_name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">

    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="product_name_fr">PRODUCT DESCRIPTION</label>
    <div class="col-md-4">
    <input id="product_name_fr"  wire:model="product_description" placeholder="PRODUCT DESCRIPTION" class="form-control input-md" required="" type="text">

    </div>
  </div>

  <!-- Select Basic -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="product_category">PRODUCT CATEGORY</label>
    <div class="col-md-4">
      <select id="product_category" wire:model="product_category" class="form-control">
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
    <input id="available_quantity" wire:model="available_quantity" placeholder="AVAILABLE QUANTITY" class="form-control input-md" required="" type="text">

    </div>
  </div>






  <div class="form-group">
      <label class="col-md-4 control-label" for="available_quantity">Status</label>
      <div class="col-md-4">
          <select id="status" wire:model="status" class="form-control input-md">
          <option value="Active">Active</option>
<option value="InActive">InActive</option>
          </select>
          <div class="form-group">
              <label class="col-md-4 control-label" for="main_image">Main Image</label>
              <div class="col-md-4">
                  <input type="file" wire:model="main_image" id="main_image" class="form-control input-md">

      </div>
    </div>

<button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
