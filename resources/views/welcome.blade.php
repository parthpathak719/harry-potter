<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <div class="wrapper">
        <!-- Envelope -->
        <div class="envelope-container" id="envelope">
            <img id="envelope-img" src="https://res.cloudinary.com/dd4ldehqo/image/upload/v1753521198/envelope_buqces.jpg" alt="Hogwarts Envelope">
            <div class="flap" id="flap"></div>
        </div>

        <!-- Letter -->
        <div id="letter-container">
            <div id="letter-scroll">
                <p id="letter-text"></p>
            </div>
        </div>
    </div>

    <audio id="themeMusic" src="{{ asset('audio/song.mp4') }}" preload="auto"></audio>
    <audio id="writingSound" src="{{ asset('audio/write.mp4') }}" preload="auto"></audio>

    <script>
        const envelope = document.getElementById('envelope');
        const flap = document.getElementById('flap');
        const letterContainer = document.getElementById('letter-container');
        const letterText = document.getElementById('letter-text');
        const music = document.getElementById('themeMusic');

        const message = `
<h1 style='text-align:center;'><b>Welcome to the Wizarding Archives</b></h1>
Dear Student,<br>
We are pleased to inform you that you have been granted access to the <strong>Wizarding Archives</strong>, 
a collection of enchanted records, ancient spells, and hidden histories preserved through centuries of magical tradition.
<br>
Contained within these Archives are documents long protected by the Ministry of Magic and Hogwarts' own Historians Circle —
tomes that whisper when opened, portraits that remember, and maps that shift with the tides of time.
<br>
You are now among a select few trusted to explore this knowledge.
<br>
Use what you uncover with <b>wisdom</b>, <b>curiosity</b>, and <b>care</b>. The past is alive here — and it watches.
<br>
<i>Your journey begins now.</i>
<br>
With great respect,<br>
<strong>Parth Pathak</strong><br>
<i>Keeper of the Scrolls</i><br>
<i>Hogwarts School of Witchcraft and Wizardry</i><br><br>
<div style="text-align:center;"><a href="{{ route('platform') }}">Go To Platform</a></div>
`;

        envelope.addEventListener('click', () => {
            envelope.classList.add('unfolding');
            
            setTimeout(() => {
                envelope.style.display = 'none';
                letterContainer.style.display = 'flex';
                letterContainer.classList.add('show');
                music.play();
                typeMessage(message);
            }, 1000); // match duration with animation
        });

        function typeMessage(text) {
            let i = 0;
            let buffer = '';
            const speed = 30;
            const writingSound=document.getElementById('writingSound');

            writingSound.loop=true;
            writingSound.play();
            writingSound.currentTime=0;
            
            function type() {
                if (i >= text.length) {
                    writingSound.pause();
                    writingSound.currentTime=0;
                    return;
                }
                // If it's an HTML tag, read full tag and append to buffer
                if (text[i] === '<') {
                    let tag = '';
                    while (i < text.length && text[i] !== '>') {
                        tag += text[i];
                        i++;
                    }
                    tag += '>';
                    i++;
                    buffer += tag;
                } else {
                    buffer += text[i];
                    i++;
                }
                
                letterText.innerHTML = buffer;
                setTimeout(type, speed);
            }
            type();
        }
    </script>
</body>
</html>
