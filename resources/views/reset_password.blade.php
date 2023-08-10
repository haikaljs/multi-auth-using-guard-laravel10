@include('nav')

<h3>Reset Password</h3>

<form action="{{ route('reset-password-submit') }}" method="post">
    @csrf
<div>
    <div>New Password</div>
    <div>
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">
    </div>
    <div>
        <input type="password" name="new_password" id="">
    </div>
    <div>Retype Password</div>
    <div>
        <input type="password" name="retype_password" id="">
    </div>

 

    <div style="margin-top: 10px;">
        <input type="submit" value="Update">
    </div>
</div>
   
</form>
<br>
<a href="{{ route('login') }}">Back to login</a>
