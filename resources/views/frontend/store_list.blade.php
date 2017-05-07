<table class="storages">
    <tr><td>STT</td><td>Quận/ Huyện</td><td>Nhà thuốc</td><td>Địa chỉ</td><td>SĐT</td></tr>
    @foreach ($stores as $k => $store)
    <tr><td>{{$k+1}}</td><td>{{$store->district->name}}</td><td>{{$store->name}}</td><td>{{$store->address}}</td><td>{{$store->phone}}</td></tr>
    @endforeach
</table>