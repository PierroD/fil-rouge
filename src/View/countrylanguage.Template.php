<div class="mt-4 row justify-content-center align-items-center">


    <div class="container"> <canvas id="myChart" class="chartjs"></canvas></div>
</div>

<?php
$arraylanguages = [];
$arraypourcentages = [];
foreach ($countrylanguages as $cl) {
    $arraylanguages[] = $cl->getLanguage();
}
foreach ($countrylanguages as $cl) {
    $arraypourcentages[] = intval($cl->getPercentage());
}
?>

<script>
    let myChart = document.getElementById('myChart');
    let myPieChart = new Chart(myChart, {
        type: 'bar',
        data: {
            labels: <?= json_encode($arraylanguages) ?>,
            datasets: [{
                label: 'Population',
                data: <?= json_encode($arraypourcentages) ?>,
                backgroundColor: [
                    'rgba(255, 50, 100, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 102, 0.6)',
                    'rgba(255, 159, 64, 0.6)',
                    'rgba(255, 99, 132, 0.6)'
                ],
            }],
        },
        options: {

        }
    });
</script>


</div>
</div>

</body>