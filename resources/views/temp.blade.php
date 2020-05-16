<table class="table">
    <thead>
        <tr>
            <th>#</th><th>Brand</th><th>Serie</th><th>Color</th><th>Year</th><th>Mileage</th><th>User Id</th>
            <th>User Email</th><th>User Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($vehicle as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->brand }}</td><td>{{ $item->serie }}</td><td>{{ $item->color }}</td><td>{{ $item->year }}</td><td>{{ $item->mileage }}</td><td>{{ $item->user_id }}</td>
            <td>{{ $item->user->email }}</td>
            <td>{{ $item->user->role }}</td>
            <td>
                <a href="{{ url('/vehicle/' . $item->id) }}" title="View Vehicle"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                <a href="{{ url('/vehicle/' . $item->id . '/edit') }}" title="Edit Vehicle"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                <form method="POST" action="{{ url('/vehicle' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Vehicle" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>