@extends("layout.AdminLayout")



@section("content")


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      Title
                    </th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Quantity</th>
                   <th>Price</th>

                   <th>Status</th>
                  </tr>
                </thead>
                @if($product)
                @if($product->count()>0)
                @foreach ($product as $p)
                <tr>
                    <td>{{ $p->product_name }}</td>
                    <td>{{ $p->product_description }}</td>
                    <td>{{ $p->product_category }}</td>
                    <td>{{ $p->available_quantity }}</td>
                    <td>${{ $p->price }}</td>
                    @if($p->status == "Active")
<td style="color: green">{{ $p->status }}</td>
                    @else
                    <td style="color: red">{{ $p->status }}</td>
                    @endif

                    <td>

                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Edit</a>
                              <a class="dropdown-item" href="#" onclick="delete_data({{ $p->id }})">Delete</a>
                              <a class="dropdown-item" href="#" onclick="status_data({{ $p->id }})"> @if($p->status == "Active")
                              InActive
                                                    @else
                                                  Active
                                                    @endif</a>
                            </div>
                          </div>
                    </td>
                  </tr>

                @endforeach
                @else
                <td>No Data</td>
                @endif
                @endif
              <tbody>
              </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>


  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


  <script>
   
    function delete_data(id){
        var formData = {
    id: id
};
$.ajax({
          type:"Post",
          url: "{{ route('admin.delete-product') }}",
          data:formData,
          dataType:"json",
          encode:true,
          headers:{
              'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },
          error: function(xhr,textStatus , errorThrown){
              console.log(xhr.responseText);
          }
      }).done(function(data){
  alert(data);
  location.reload();
      })

    }




    function status_data(id){
        var formData = {
    id: id
};
$.ajax({
          type:"Post",
          url: "{{ route('admin.status-product') }}",
          data:formData,
          dataType:"json",
          encode:true,
          headers:{
              'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },
          error: function(xhr,textStatus , errorThrown){
              console.log(xhr.responseText);
          }
      }).done(function(data){
  alert(data);
  location.reload();
      })

    }
    </script>
@endsection
