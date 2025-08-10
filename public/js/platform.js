window.onload=function() {
                document.getElementById('id06').style.display='block';
            }
const bgVideo = document.getElementById('bg-video');
const wallVideo = document.getElementById('wall-video');
const sound=new Audio('/audio/zoom.mp4');
const ticket = document.getElementById('ticket');
const button1 = document.getElementById('button1');
const gothrough = document.querySelector('.go-through');
const blackout = document.getElementById('blackout');

wallVideo.style.display = 'none';

// Unmute button
button1.addEventListener('click', () => {
    bgVideo.muted = false;
    wallVideo.play().catch(err => console.warn("Wall video can't play yet:", err));
    button1.style.display = 'none';
});

// Click ticket
ticket.addEventListener('click', function() {
    wallVideo.style.display = 'flex';
    gothrough.style.display = 'block';
    wallVideo.muted = false;
    wallVideo.play().catch(err => console.warn("Autoplay with sound blocked:", err));

    ticket.style.display = 'none';
    document.querySelector('.arrow-label').style.display = 'none';
    bgVideo.style.display = 'none';
    bgVideo.muted = true;
    button1.style.display = 'none';
});

// Click wall video to run animation
wallVideo.addEventListener('click', function() {
    sound.play();
    wallVideo.classList.add('run-to-wall');
    gothrough.style.display = 'none';
    wallVideo.muted = true;
});

// When run animation ends → blackout & redirect
wallVideo.addEventListener('animationend', function() {
    blackout.classList.add('show');
    setTimeout(() => {
        window.location.href = "/kingcross"; // Change to your target page
    }, 1000);
});
