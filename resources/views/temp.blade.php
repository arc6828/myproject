@foreach($payment as $item)
    <tr>
        ...
        <td>{{ $item->user_id }} {{ $item->user->name }}</td>
        <td>{{ $item->order_id }}</td>
        <td>{{ $item->slip }}  <img src="{{ url('storage/'.$item->slip )}}" width="100" /> </td>
        ...
    </tr>
@endforeach