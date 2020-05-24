@switch($item->status)
    @case("created") 
        <div>รอหลักฐานการชำระเงิน</div>
        <a class="btn btn-sm btn-warning" href="{{ url('payment/create?order_id='.$item->id) }}">ส่งหลักฐาน</a>
        @break
    @case("checking") 
        <div>รอตรวจสอบ</div>
        <div><img src="{{ asset("storage/{$item->payment->slip}")  }}" width="100" /></div>
        @if(Auth::user()->role == "admin")
        <form method="POST" action="{{ url('/order/' . $item->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <select class="" name="status" id="status" >
                <option value="paid">ชำระเงินเรียบร้อย</option>
                <option value="cancelled">ยกเลิกออร์เดอร์</option>
            </select>
            <button class="btn btn-primary btn-sm" type="submit">เปลี่ยนสถานะ</button>       
        </form>
        @endif
        @break
    @case("paid") 
        <div>ชำระเงินแล้ว รอเลข tracking</div>
        @if(Auth::user()->role == "admin")
        <form method="POST" action="{{ url('/order/' . $item->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}                                                            
            <input name="tracking" type="text" id="tracking" value="" placeholder="ใส่เลข tracking...">
            <input name="status" type="hidden" id="status" value="completed" >
            <button class="btn btn-primary btn-sm" type="submit">ส่งเลข Tracking</button>       
        </form>
        @endif
        @break
    @case("completed") 
        <div>ส่งสินค้าแล้ว</div>
        <div>เลขติดตามพัสดู</div>
        <div>{{ $item->tracking }}</div>
        @break
@endswitch