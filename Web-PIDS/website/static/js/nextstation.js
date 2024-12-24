// Fungsi memperbarui card berdasarkan kondisi timeline
function updateNextStationCard() {
    const nextStationCard = document.querySelector('#nextStationName');
    const stationStatus = document.querySelector('#stationStatus');
    const currentStation = document.querySelector('.timeline-item.current');
    const activeStations = Array.from(document.querySelectorAll('.timeline-item.active'));

    if (currentStation) {
        // Jika ada stasiun current
        const stationName = currentStation.querySelector('.station-name').textContent;
        nextStationCard.textContent = stationName;
        stationStatus.textContent = "Anda Berada di";
    } else {
        // Cari stasiun selanjutnya (setelah active terakhir)
        let nextStation = null;
        for (let station of document.querySelectorAll('.timeline-item')) {
            if (!station.classList.contains('active')) {
                nextStation = station;
                break;
            }
        }

        // Jika semua sudah active, ambil stasiun terakhir
        if (!nextStation && activeStations.length > 0) {
            nextStation = activeStations[activeStations.length - 1];
        }

        // Perbarui nama stasiun di card
        if (nextStation) {
            const stationName = nextStation.querySelector('.station-name').textContent;
            nextStationCard.textContent = stationName;
            stationStatus.textContent = "Stasiun Selanjutnya";
        }
    }
}

// Jalankan fungsi pembaruan setiap kali rolling berjalan
setInterval(updateNextStationCard, 3000);