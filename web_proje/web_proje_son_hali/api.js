
const API_KEY = 'AIzaSyDnKbn-MtGJy8bmCoHhIh31LtuHWSwhxpA';
const CHANNEL_ID = 'UCzNu79N8Lq1wUY52MkhWKSA';


// Çekmek istediğimiz maksimum video sayısı
const MAX_RESULTS = 30;

// Videoları çekmek için YouTube Data API'ye istek gönderir
async function fetchVideos() {
    const response = await fetch(`https://www.googleapis.com/youtube/v3/search?key=${API_KEY}&channelId=${CHANNEL_ID}&part=snippet,id&order=date&maxResults=${MAX_RESULTS}`);
    const data = await response.json();
    return data.items;
}

// Belirli bir videonun detaylarını çekmek için YouTube Data API'ye istek gönderir
async function fetchVideoDetails(videoId) {
    const response = await fetch(`https://www.googleapis.com/youtube/v3/videos?key=${API_KEY}&id=${videoId}&part=contentDetails`);
    const data = await response.json();
    return data.items[0];
}

// Videoları ekrana yazdırmak için kullanılır
async function displayVideos(videos) {
    const videoContainer = document.getElementById('video-container');
    videoContainer.innerHTML = ''; // Önceki videoları temizler

    for (const video of videos) {
        if (video.id.videoId) { // Yalnızca video ID'si olan öğeleri işler
            const videoDetails = await fetchVideoDetails(video.id.videoId); // Video detaylarını alır
            const embeddable = videoDetails.contentDetails.regionRestriction ? !videoDetails.contentDetails.regionRestriction.blocked.includes('US') : true; // Videonun gömülebilir olup olmadığını kontrol eder

            if (embeddable) { // Eğer video gömülebilir ise
                const videoElement = document.createElement('div');
                videoElement.classList.add('video-card');
                videoElement.innerHTML = `
                    <iframe src="https://www.youtube.com/embed/${video.id.videoId}" frameborder="0" allowfullscreen></iframe>
                    <h3>${video.snippet.title}</h3>
                    <p>${video.snippet.description.substring(0, 100)}...</p>
                `;
                videoContainer.appendChild(videoElement); // Video kartını sayfaya ekler
            }
        }
    }
}

// Sayfa yüklendiğinde videoları çeker ve ekrana yazdırır
document.addEventListener('DOMContentLoaded', async () => {
    const videos = await fetchVideos();
    displayVideos(videos);
});