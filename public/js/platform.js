const bgVideo = document.getElementById('bg-video');
const wallVideo = document.getElementById('wall-video');
const sound=new Audio('/audio/zoom.mp4');
const ticket = document.getElementById('ticket');
const gothrough = document.querySelector('.go-through');
const blackout = document.getElementById('blackout');

wallVideo.style.display = 'none';

window.addEventListener('load', () => {
    if (localStorage.getItem('audioAllowed') === 'true') {
        bgVideo.play();
        bgVideo.muted = false;
    }
});

// Click ticket
ticket.addEventListener('click', function() {
    wallVideo.style.display = 'flex';
    wallVideo.muted = false;
    wallVideo.currentTime = 0;
    wallVideo.play().catch(err => console.warn("Autoplay with sound blocked:", err));

    ticket.style.display = 'none';
    document.querySelector('.arrow-label').style.display = 'none';
    bgVideo.style.display = 'none';
    bgVideo.muted = true;
});

wallVideo.addEventListener('timeupdate', function() {
    if (wallVideo.currentTime >= wallVideo.duration) {
        wallVideo.pause();
        gothrough.style.display = 'block';

        // Click wall video to run animation
        wallVideo.addEventListener('click', function() {
            sound.play();
            wallVideo.classList.add('run-to-wall');
            gothrough.style.display = 'none';
            wallVideo.muted = true;
        });
    }
});

// When run animation ends → blackout & redirect
wallVideo.addEventListener('animationend', function() {
    blackout.classList.add('show');
    setTimeout(() => {
        window.location.href = "/kingcross"; // Change to your target page
    }, 1000);
});
