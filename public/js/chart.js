const ctx = document.getElementById('GrafikTrenKunjungan');

fetch('/api/chart-tren-kunjungan')
    .then(response => response.json())
    .then(data => {

        new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: data.labels,      // nama bulan
                datasets: [{
                    label: 'Jumlah Kunjungan',
                    data: data.values,     // total kunjungan per bulan
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    r: {
                        beginAtZero: true
                    }
                }
            }
        });

    })
    .catch(error => console.error(error));


    