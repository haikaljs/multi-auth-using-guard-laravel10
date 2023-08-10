@include('nav')

<h3>Registration Page</h3>

<form action="{{ route('register-submit') }}" method="post">
    @csrf
<div>
    <div>Name</div>
    <div>
        <input type="text" name="name" id="">
    </div>
    <div>Email</div>
    <div>
        <input type="email" name="email" id="">
    </div>

    <div>Password</div>
    <div>
        <input type="password" name="password" id="">
    </div>

    <div>Retype Password</div>
    <div>
        <input type="password" name="retype_password" id="">
    </div>

    <div style="margin-top: 10px;">
        <input type="submit" value="Register">
    </div>
</div>
   
</form>