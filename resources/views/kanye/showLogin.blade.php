<!DOCTYPE html>   
<html>   
<head>  
<title> Login Page </title>  
</head>    
<body>    
   @if(isset($apiToken))
   <label>copy token</label>
    <h3>{{ $apiToken}}</h3>
    <form method="post" action="{{ url('api/verifytoken') }}">          
            <input type="text" placeholder="Enter token" name="token" required>  
            <input type="submit">   
    </form> 
    @else
<h1>Login Form </h1>
    <form method="post">  
        <div class="container">
            <label>Username : </label>   
            <input type="text" placeholder="Enter Username" name="email" required>  
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" required>  
            <button type="submit">Login</button>   
        </div>   
    </form>     
@endif

</body>     
</html>