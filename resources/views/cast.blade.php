<x-layout>
    <script>
            window.onload=function() {
                document.getElementById('id05').style.display='block';
            }
    </script>
    <div class="modal5" id="id05">
        <div id="modal-content5">
            <span id="close5" onclick="document.getElementById('id05').style.display='none';">&times;</span>
                <h1>Welcome To Cast!!</h1>
                <p>"Unmute" And Enjoy The Video!!</p>
        </div>
    </div>

    <video id="bg-video" autoplay loop muted>
        <source src="{{ asset('videos/wizard.mp4') }}" type="video/mp4">
    </video>

    <button id="button1" onclick="document.getElementById('bg-video').muted = false; this.style.display='none';">🔊 Unmute</button>
</x-layout>