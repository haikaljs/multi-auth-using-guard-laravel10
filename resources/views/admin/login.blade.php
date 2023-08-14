

<h3>Login Page</h3>

<form action="{{ route('admin-login-submit') }}" method="post">
    @csrf
<div>
    <div>Email</div>
    <div>
        <input type="email" name="email" id="">
    </div>

    <div>Password</div>
    <div>
        <input type="password" name="password" id="">
    </div>

    <div style="margin-top: 10px;">
        <input type="submit" value="Login">
    </div>
</div>
   
</form>
