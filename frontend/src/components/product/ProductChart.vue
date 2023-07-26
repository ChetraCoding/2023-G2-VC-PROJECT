<!-- Reference : https://apexcharts.com/vue-chart-demos/column-charts/column-with-data-labels/ -->
<template>
  <div>
    <apexchart
      height="550"
      type="bar"
      :options="options"
      :series="series"
    ></apexchart>
  </div>
</template>

<script>
let data = [
  { product_name: "Pizza", total_orders: 1000 },
  { product_name: "Humburger", total_orders: 1300 },
];

const filter = (key) => {
  let items = [];
  data.filter(function (value) {
    items.push(value[key]);
  });
  return items;
};

export default {
  data() {
    return {
      options: {
        plotOptions: {
          bar: {
            columnWidth: "50px",
            borderRadiusApplication: "end",
            borderRadiusWhenStacked: "last",
            borderRadius: 10,
            margin: 70,
          },
        },
        yaxis: {
          min: 0,
          labels: {
            formatter: function (value) {
              return value + " Items ";
            },
            style: {
              fontSize: "0.8rem",
              fontFamily: "Inter, sans-serif",
              fontWeight: 500,
              cssClass: "apexcharts-yaxis-label",
              colors: "white",
            },
          },
        },
        xaxis: {
          labels: {
            formatter: function (value) {
              return value;
            },
            style: {
              fontSize: "0.8rem",
              fontFamily: "Inter, sans-serif",
              cssClass: "apexcharts-xaxis-label",
              colors: "white",
            },
          },
          categories: filter("product_name"),
        },
      },
      series: [
        {
          data: filter("total_orders"),
          color: "#F25657",
        },
      ],
    };
  },
};
</script>
