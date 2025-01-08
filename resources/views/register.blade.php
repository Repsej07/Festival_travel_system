@extends('layouts.app')
@section('content')
<div class="">

</div>
<div class=" flex flex-col justify-center items-center">
    <h1 class="text-3xl font-bold text-center m-5">Register here!</h1>
    <div class="flex justify-center items-center content-center max-h-full">
    <form action="" class="form flex flex-col m-5 max-w-md border-solid border-2 border-gray-200 p-5 rounded-md">
        @csrf
        <div class="flex space-x-4 mb-5">
            <input type="text" name="first_name" placeholder="First Name" class="form-input flex-1 ">
            <input type="text" name="last_name" placeholder="Last Name" class="form-input flex-1">
        </div>
        <input type="email" name="email" placeholder="Email" class="form-input mb-5">
        <input type="text" name="user_name" placeholder="User Name" class="form-input mb-5">
        <input type="password" name="password" placeholder="Password" class="form-input mb-5">
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-input mb-5">
        <button type="submit" class="pr-5 pl-5 bg-apple_button_blue p-3 rounded-md text-white font-bold">Create account</button>
    </form>
</div>


</div>
@endsection
