<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platform 9¾</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon/favicon2.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/platform.css') }}">
</head>
<body>
    <script>
        window.onload=function () {
            document.getElementById('id06').style.display = 'block';
        }
    </script>
    <div class="modal6" id="id06">
            <div id="modal-content6">
                <span id="close6" onclick="document.getElementById('id06').style.display='none';">&times;</span>
                <h1>Welcome To Platform 9¾!!</h1>
                <p>Get Your Ticket For King Cross Station!!</p>
            </div>
    </div>

    <video id="bg-video" loop muted>
        <source src="{{ asset('videos/platform.mp4') }}" type="video/mp4">
    </video>

    <div class="scene">
        <div class="arrow-label">
            <p>Click Me!</p>
            <div class="arrow"></div>
        </div>

        <img id="ticket" src="https://res.cloudinary.com/dd4ldehqo/image/upload/v1754752509/ticket2_1_myw42l.jpg" alt="Train Ticket">

        <video id="wall-video" muted>
            <source src="{{ asset('videos/wall.mp4') }}" type="video/mp4">
        </video>

        <div class="go-through">
            <p>Go Through Here</p>
            <div class="arrow-down"></div>
        </div>
    </div>

    <!-- Blackout overlay -->
    <div id="blackout"></div>

    <script src="{{ asset('js/platform.js') }}"></script>
</body>
</html>
