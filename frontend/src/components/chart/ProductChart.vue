<template>
  <div id="chart">
    <apexchart
      class="mt-4 bg-grey-darken-4 text-white"
      type="bar"
      height="630"
      :options="chartOptions"
      :series="sale"
    ></apexchart>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      chartOptions: {
        chart: {
          id: "basic-bar",
        },
        xaxis: {
          categories: [
            "Pizza",
            "Humburger",
            "Coca",
            "Donut",
            "Checken",
            "Potato",
            "Original Pizza",
            "Milk Tea",
          ],
          labels: {
            style: {
              fontSize: "15px",
              fontFamily: "Arial, sans-serif",
              colors: "white",
            },
          },
        },
        plotOptions: {
          bar: {
            colors: {
              ranges: [
                {
                  from: 0,
                  to: 100,
                  color: "#ff0000",
                },
              ],
            },
            columnWidth: "50%", 
            columnPadding: "10px",
          },
        },
      },
      sale: [
        {
          name: "series-1",
          data: [30, 40, 45, 50, 49, 60, 70, 91],
        },
      ],
    };
  },
};
</script>

<style>
#basic-bar {
  background: red;
}
</style>