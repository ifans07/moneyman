<div class="col-md-6" style="height: 400px; width: 400px;">
    <canvas id="incomeChart"></canvas>
</div>
<div class="col-md-6" style="height: 400px; width: 400px;">
    <canvas id="expenseChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom"></script>
<script>
        const incomeDataC = <?= json_encode($incomeCategories) ?>;
        const expenseData = <?= json_encode($expenseCategories) ?>;

        new Chart(document.getElementById('incomeChart'), {
            type: 'pie',
            data: {
                labels: incomeDataC.map(d => d.kategori),
                datasets: [{
                    data: incomeDataC.map(d => d.total),
                    // backgroundColor: ['#006ba6', '#0496ff', '#ffbc42', '#d81159','#8f2d56'],
                    // borderColor: ['#006ba6', '#0496ff', '#ffbc42', '#d81159','#8f2d56']
                    backgroundColor: [
                        "rgba(255, 188, 66, .7)",
                        "rgba(162, 210, 255, .7)", 
                        "rgba(255, 200, 221, .7)", 
                        "rgba(189, 224, 254, .7)",
                        "rgba(255, 175, 204, .7)",
                        // '#ffbc42',
                        // '#a2d2ff',
                        // '#ffc8dd',
                        // '#bde0fe',
                        // '#ffafcc'
                    ],
                    borderColor: [
                        '#ffbc42', 
                        '#a2d2ff', 
                        '#ffc8dd', 
                        '#bde0fe',
                        '#ffafcc'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: '#fafafa',
                            font: {
                                size: 14
                            }
                        }
                    },
                    tooltip: {
                        enabled: true
                    },
                },
            },
        });

        new Chart(document.getElementById('expenseChart'), {
            type: 'pie',
            data: {
                labels: expenseData.map(d => d.kategori),
                datasets: [{
                    data: expenseData.map(d => d.total),
                    // backgroundColor: ['#f44336', '#e57373', '#ff5722'],
                    // borderColor: ['#f44336', '#e57373', '#ff5722']
                    // backgroundColor: ['#74b3ce', '#09bc8a', '#508991','#004346','#172a3a'],
                    backgroundColor: [
                        "rgba(9, 188, 138, 0.7)",
                        "rgba(220, 53, 69, 0.7)",
                        "rgba(33, 150, 243, 0.7)",
                        "rgba(75, 192, 192, 0.7)",
                        "rgba(255, 99, 132, 0.7)",
                        // "rgba(76, 175, 80, 0.7)",
                        // "rgba(244, 67, 54, 0.7)",
                        // "#4CAF50",
                        // "#F44336",
                        // "#2196F3",
                        // "#198754",
                        // "#dc3545",
                    ],
                    borderColor: [
                        "rgba(9, 188, 138, 1)",
                        "rgba(220, 53, 69, 1)",
                        "rgba(33, 150, 243,1)",
                        "rgba(75, 199, 132, 1)",
                        "rgba(255, 99, 132, 1)",
                        // "rgba(76, 175, 80, 1)",
                        // "rgba(244, 67, 54, 1)",
                        // "#4CAF50",
                        // "#F44336",
                        // "#2196F3",
                        // "#198754",
                        // "#dc3545",
                    ],
                    // borderColor: ['#74b3ce', '#09bc8a', '#508991','#004346','#172a3a']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: '#fafafa',
                            font: {
                                size: 14
                            }
                        }
                    },
                    tooltip: {
                        enabled: true
                    }
                },
            },
        });
</script>