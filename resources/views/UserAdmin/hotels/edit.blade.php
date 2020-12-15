@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('UserAdmin.partials.left_side_bar')
                
            <div class="col-md-8">
                <div class="card">
                    @include('UserAdmin.partials.add_object_bar')

                    <div class="card-body">
                       edit
                    </div>
                    
                </div>
            </div>
    </div>   
</div>
@endsection