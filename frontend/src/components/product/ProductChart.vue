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
{ name: 'Pizza', total: 1000 },
{ name: 'Humburger', total: 3000 },
{ name: 'Donut', total: 6000 },
{ name: 'Potato', total: 7000 },
{ name: 'Orginal Pizza', total: 3000 },
{ name: 'Orginal Humburger', total: 5000 },
{ name: 'Coca', total: 7000 },
{ name: 'Milk Tea', total: 1000 },
{ name: 'Cheeseburger.', total: 1000 },
{ name: 'Sandwich.', total: 1500 },
{ name: 'Hot dog.ov', total: 2300 },
{ name: 'Burrito', total: 2000 },
{ name: 'Burrito', total: 3000 },
{ name: 'Burrito', total: 4000 },
{ name: 'Burrito', total: 5000 },
{ name: 'Burrito', total: 8000 },
{ name: 'Burrito', total: 7000 },
{ name: 'Burrito', total: 4000 },
{ name: 'Burrito', total: 5000 },
{ name: 'Burrito', total: 6000 },
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
        },
      },
      yaxis: {
        min: 0,
        labels: {
          formatter: function (value) {
            return  value + " Items " ;
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
        categories: filter('name')
      },
    },
    series: [
      {
        data: filter('total'),
        color: "#F25657",
      },
    ],
  };
},
};
</script>

<style scoped>
/* .apexcharts-bar-series.apexcharts-plot-series .apexcharts-series path {
clip-path: inset(0% 0% -11% 0% round 16px);
} */
</style>