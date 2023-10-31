
<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Inter', sans-serif;
        }
        #inputan::placeholder{
            color: #B6B6B6
        }
    </style>
</head>
<body style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #f2f2f2;" >
<form action="/login" method="POST">
    @csrf
    <div class="wrapper" style="position: relative; width: Fixed(300px);  background-color:#fff; height: Hug(343px); display: flex; justify-content: center; align-items: center; padding:30px; gap:20px; border-radius:15px;">
        <div class="login-form">
            <div style="display: flex; justify-content:center">
                <img width= 70px;  src="{{ asset('asset/image/logo_rapier.png') }}" alt="logo_rapier">
            </div>
            <div class="invalid-feedback">
            <div class="input-box" style="position: relative; width: 280px; margin: 30px 0;">
                <label style="font-weight: 600; font-size: 14px; margin-bottom: 10px;">Username</label>
                <input name="name" id="inputan"value='{{ old('name') }}' type="text" required placeholder="Enter username" style="background-color: #f2f2f2; border:none; width:240px; height:28px; border-radius:8px; padding:10px; margin-top: 10px"  autocomplete="off" class="@error('name') is invalid @enderror"/>
                <div class="error" style="color: #FF1F1F;font-size:12px;font-family: Inter;"> @if (session()->has('error'))
                    {{ session('error') }}
                @endif
            </div>
            @error('name')
       
            {{ $message }}
        </div>
        @enderror
       
            <div class="input-box" style="position: relative; width: 280px; margin: 30px 0 0 0;">
                <label style="font-weight: 600; font-size: 14px; margin-bottom: 10px;">Password</label>
                <input name="password" id="inputan" value="{{ old('password') }}" type="password" required placeholder="Enter password" style="background-color: #f2f2f2; border:none; width:240px; height:28px; border-radius:8px; padding:10px; margin-top: 10px"  autocomplete="off" class="@error('password') is invalid @enderror"/>
               <div class="error" style="color: #FF1F1F;font-size:12px;font-family: Inter;"> @if (session()->has('error'))
                {{ session('error') }}
            @endif
        </div>
            </div>
            <div class="invalid-feedback" style="font-size: 12px; color:#FF1F1F;">
            @error('password')
   
              {{ $message }}
            </div>
          @enderror
            <button type="submit" class="btn" style="background-color:#FF1F1F; color:#fff; width:260px; height:45px; border-radius:5px; cursor:pointer; border: none; padding: 10px; font-size:.8em; margin-top: 30px;">Login
            </button>
        </div>
    </div>
</form>
</body>
</html>