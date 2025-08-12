<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon/favicon4.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/details.css') }}">
</head>
<body style="background: url('{{ $details->background_image }}') no-repeat center top fixed; background-size: contain; margin: 0; padding: 0; background-color: #000;">
    
    
    <div class="content">
        <h1>{{ $details->name }}</h1>

        <div class="info-grid">
            <div class="label">Type:</div>
            <div class="value">{{ $details->type }}</div>

            <div class="label">Wand Core:</div>
            <div class="value">{{ $details->wand }}</div>

            <div class="label">Specialties:</div>
            <div class="value">{{ $details->specialisation }}</div>

            <div class="label">Patronus:</div>
            <div class="value">{{ $details->patronus }}</div>

            <div class="label">Titles:</div>
            <div class="value">{{ $details->title }}</div>
        </div>

        <h2>Bio:</h2>
        <p>{{ $details->bio }}</p>

        @if(!empty($details->quote))
            <h2>Famous Quotes:</h2>
            @foreach (explode("' '",trim($details->quote,"'")) as $q)
                <blockquote>'{{$q}}'</blockquote>
            @endforeach
        @endif


        @if (empty($details->theme_song))
            <audio id="normal-audio" loop muted>
                <source src="{{ asset('audio/song.mp4') }}" type="audio/mp4">
            </audio>
        @else
            @if($details->name == "Albus Percival Wulfric Brian Dumbledore")
                <audio id="normal-audio" loop muted>
                    <source src="{{ asset('audio/dumbledore.mp4') }}" type="audio/mp4">
                </audio>
            @elseif($details->name == "Harry James Potter")
                <audio id="normal-audio" loop muted>
                    <source src="{{ asset('audio/harry.mp4') }}" type="audio/mp4">
                </audio>
            @else
                <audio id="normal-audio" loop muted>
                    <source src="{{ asset('audio/villain.mp4') }}" type="audio/mp4">
                </audio>
            @endif
        @endif
    </div>
    <script src={{ asset('js/details.js') }}></script>
</body>
</html>
