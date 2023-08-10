@include('nav')

<h3>Forget Password</h3>

<form action="" method="post">
<div>
    <div>Email</div>
    <div>
        <input type="email" name="email" id="">
    </div>

 

    <div style="margin-top: 10px;">
        <input type="submit" value="Login">
    </div>
</div>
   
</form>
<br>
<a href="{{ route('login') }}">Back to login</a>
