@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">

        @include('UserAdmin.partials.left_side_bar')

        <div class="col-md-8">
            <div class="card">
                @include('UserAdmin.partials.add_object_bar')
            </div>
            @foreach ($hotels as $hotel)

            <div class="result-item">
                <div class="thumb">
                    <?php $image = App\HotelImage::where('hotel_id',$hotel->id)->first() ?>
                    <a href="/images/{{ object_get($image,"image") }}" title="{{$hotel->name_bg}}">
                        <i class="pi-24 vip"></i>
                          <img src="{{asset('images')}}/{{ object_get($image,"image") }}" class="" alt="{{$hotel->name_bg}}" title="{{$hotel->name_bg}}">
                    </a>
                </div>
                <div class="info">
                    <div class="left-side">

                        <div class="header">

                                <div class="title"><a href="#" title="{{$hotel->name_bg}}">{{$hotel->name_bg}}</a></div>
                                    <div class="rating">
                                      <span class="star-14"></span>
                                      <span class="star-14"></span>
                                      <span class="star-14"></span>
                                      <span class="star-14"></span>
                                      <span class="star-14"></span>
                                    </div>
                                </div>
                                <div class="content xl">
                                    {{$hotel->description}}   ...
                                </div>
                                </div>
                    <div class="right-side">
                      <ul>
                        <li class="price">
                            <img src="{{ asset('icons/price_icon.jpg') }}" class="icon" alt="" title="">
                                 {{$hotel->start_price}} лв.
                        </li>

                        <li class="phone">
                            <img src="{{ asset('icons/phone_icon.jpg') }}" class="icon" alt="" title="">
                              <a href="{{$hotel->phone}}">{{$hotel->phone}}</a>
                        </li>
                        <li class="email">
                            <a href="#" >
                                <img src="{{ asset('icons/email_icon.jpg') }}" class="icon" alt="" title="">
                                запитване</a>
                        </li>
                        @if ( Auth::user())
                        <li class="btn">
                            <a href="{{ route('hotels.show',$hotel->id)}}" class="btn btn-info btn-sm btn-block">view</a>
                        </li>
                        <li class="btn">
                            <a href="{{ route('hotels.edit',$hotel->id)}}" class="btn btn-warning btn-sm btn-block">edit</a>
                        </li>
                        <li class="btn">
                            <form action="{{ route('hotels.destroy', $hotel->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm btn-block" type="submit">delete</button>
                              </form>
                        </li>
                        @endif


                      </ul>

                    </div>
                </div>

            </div>

            @endforeach
            {{ $hotels->links() }}
        </div>

    </div>
</div>
@endsection
