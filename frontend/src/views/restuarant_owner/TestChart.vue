<template>
  <div>
    <canvas ref="chart"></canvas>
  </div>
</template>

<script>
import Chart from 'chart.js/auto';

export default {
  props: {
    chartData: {
      type: Object,
      required: true
    },
    chartOptions: {
      type: Object,
      default: () => ({})
    }
  },
  mounted() {
    this.createChart();
  },
  methods: {
    createChart() {
      const canvas = this.$refs.chart;
      const ctx = canvas.getContext('2d');
      new Chart(ctx, {
        type: 'pie',
        data: this.chartData,
        options: this.chartOptions
      });
    }
  }
};
</script>