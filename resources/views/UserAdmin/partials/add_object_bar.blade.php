@section('add_object_bar')
    <div class="card">
            <div class="card-header"><h5>Административен панел</h5></div>
            <div class="card-body">
                Добавете обект  ---->>>>>
                <a href="{{route('hotels.create')}}">ХОТЕЛ</a> -
                <a href="#">РЕСТОРАНТ</a> -
                <a href="#">АТРАКЦИОН</a>
            </div>
    </div>

@show

