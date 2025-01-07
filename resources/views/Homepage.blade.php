{{$header = null}}
@extends('layouts.app')
@section('content')
    <div class=" flex flex-col justify-center items-center max-h-screen h-80 ">
        <h1 class="text-4xl font-bold text-center m-0">Welcome to Festival Travel System</h1>
        <p class="text-center m-5">Please register or login to continue</p>
        <div class="flex justify-center items-center">
            <button class="bg-apple_button_blue text-white rounded-md h-12 max-h-[50px] px-10 m-4 hover:bg-apple_button_blue_hover">
                Login
              </button>
              <button class="bg-apple_button_blue text-white rounded-md h-12 max-h-[50px] px-10 m-4 hover:bg-apple_button_blue_hover">
                Register
              </button>

        </div>
    </div>
@endsection
