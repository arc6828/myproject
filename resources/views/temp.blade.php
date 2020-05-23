<div class="card">
    ...
</div>

@php
    $orderproduct = $order->order_products;
@endphp

<div class="table-responsive">
    <table class="table">
        ...
        @foreach($orderproduct as $item)
            ...
        @endforeach
        </tbody>
    </table>
    <div class="pagination-wrapper"> {!! $orderproduct->appends(['search' => Request::get('search')])->render() !!} </div>
</div>