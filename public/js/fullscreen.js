const fullscreenButton = document.getElementById('fullscreen-button');
                
fullscreenButton.addEventListener('click', toggleFullscreen);

function toggleFullscreen() {
    if (document.fullscreenElement) {
        
        document.exitFullscreen();
    } else {

        document.documentElement.requestFullscreen();
    }
}