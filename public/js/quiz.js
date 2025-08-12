window.addEventListener('load', () => {
    if (localStorage.getItem('audioAllowed') === 'true') {
        document.getElementById('normal-audio').play();
        document.getElementById('normal-audio').muted=false;
        document.addEventListener('click', () => {
            document.getElementById('normal-audio').play();
            document.getElementById('normal-audio').muted=false;
        });
    }
});