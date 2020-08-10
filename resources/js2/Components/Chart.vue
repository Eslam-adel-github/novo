<template>
         <canvas :id="id"></canvas>
</template>
<script>
    export default {
        props:{
            chart_type: {
                type: String,
                default: 'pie'
            },
            id: {
                type: String,
                default: 'planet-chart'
            },
            label:{
                type:Array,
                default:[],
            },
            data:{
                type:Array,
                default:[],
            },
        },
        mounted() {
            this.createChart(this.id, this.chart_type,this.label,this.data);
        },
        methods: {
            createChart(chartId, chartData,label,data) {
                const ctx = document.getElementById(chartId);
                var myChart = new Chart(ctx, {
                    type: chartData,
                    data: {
                        labels:label,
                        datasets: [{
                            label: '',
                            data:data,
                            backgroundColor: [

                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(255, 0, 0, 1)',

                            ],
                            borderColor: [

                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                offset: true,
                                ticks: {
                                    beginAtZero: true,
                                }
                            }],
                        }
                    }
                });
            }
        }
    };
</script>


