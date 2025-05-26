<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Admin Panel – Zakazani termini</h2>
    </x-slot>

    <div class="p-6">
        <div id="termini-chart" style="width: 100%; height: 500px;"></div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            const data = google.visualization.arrayToDataTable(@json($chartData));

            const options = {
                title: 'Broj zakazanih termina po danima',
                hAxis: { title: 'Datum',  titleTextStyle: { color: '#333' } },
                vAxis: { minValue: 0 },
                colors: ['#4285F4'],
            };

            const chart = new google.visualization.ColumnChart(document.getElementById('termini-chart'));
            chart.draw(data, options);
        }
    </script>
</x-app-layout>
