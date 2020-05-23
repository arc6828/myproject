<table class="table">
    <thead>
        <tr>
            <th>#</th><th>Order Id</th><th>Product Id</th><th>User Id</th><th>Quantity</th><th>Price</th><th>Total</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orderproduct as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->order_id }}</td>
            <td>{{ $item->product->title }} ({{ $item->product_id }})</td>
            <td>{{ $item->user->name }} ({{ $item->user_id }}) </td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->total }}</td>
            <td>
                <a href="{{ url('/order-product/' . $item->id) }}" title="View OrderProduct"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                <a href="{{ url('/order-product/' . $item->id . '/edit') }}" title="Edit OrderProduct"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                <form method="POST" action="{{ url('/order-product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete OrderProduct" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>