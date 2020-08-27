window.addEventListener('load', function() {
    if ('serviceWorker' in navigator) {
        try {
            navigator.serviceWorker.register('./sw.js');
        } catch (e) {
            console.log('SW registration failed');
        }
    }
})