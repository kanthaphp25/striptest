<html>
<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
<body>

<h1 class="text-center" style="border-bottom:double">Products</h1>
<table class="table table-bordered table-hover">
    <thead>
        <th>Name</th>
        <th>Price</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @if ($products->count() == 0)
        <tr>
            <td colspan="5">No products to display.</td>
        </tr>
        @endif

        @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>

                <form style="display:inline-block" action="{{url(route('checkout'))}}" method="POST">
                    @csrf
					<input type="text" name="product_id" value="{{$product->id}}" style="display:none" >
                    <button class="btn btn-sm btn-danger"> buy now</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $products->links() }}
</body>
</html>


