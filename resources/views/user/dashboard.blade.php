@extends('layouts.app')

@section('content')
<switch-screen :switch-state="{{$state}}"></switch-screen>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are a user!!
                    <br>
                    You are logged in!
                </div>
            </div>
            <br>
            

        </div>
    </div>
</div> --}}
@endsection
