<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/error') }}/style.css">
    <title>403 Forbidden</title>
</head>
<body>
<div class="room">
    <div class="cuboid">
        <div class="side"></div>
        <div class="side"></div>
        <div class="side"></div>
    </div>
    <div class="oops">
        <h2>OOPS!</h2>
        <p>Forbidden UnAuthorized 🙄</p>
    </div>
    <div class="center-line">
        <div class="hole">
            <div class="ladder-shadow"></div>
            <div class="ladder"></div>
        </div>
        <div class="four">4</div>
        <div class="four">3</div>
        <div class="btn">
            <a href="{{ route('dashboard.welcome') }}">BACK TO HOME</a>
        </div>
    </div>
</div>
</body>
</html>