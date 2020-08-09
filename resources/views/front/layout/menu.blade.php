<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
            Menu
        </li>
        @foreach ($theloai as $item)
        <li style="cursor:pointer;" href="" class="list-group-item menu1">
            {{ $item->Ten }}
        </li>
        <?php
        if (count($item->loaitin) > 0) {
            $loaitins = $item->loaitin;
        ?>
            <ul>
                @foreach ($loaitins as $loaitin)
                <li class="list-group-item">
                    <a href="{{ url('loaitin/'.$loaitin->id.'/'.$item->TenKhongDau) }}">{{ $loaitin->Ten }}</a>
                </li>
                @endforeach
            </ul>
        <?php
        }
        ?>
        @endforeach
    </ul>
</div>