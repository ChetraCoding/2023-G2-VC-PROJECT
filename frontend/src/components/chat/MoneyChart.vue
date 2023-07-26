<template>
  <div>
    <apexchart
      height="500"
      type="bar"
      :options="options"
      :series="series"
    ></apexchart>
  </div>
  <!-- </v-main> -->
</template>
<script setup>
const data = [
  {
    month: "Jan",
    year: 2023,
    total_money: "100",
  },
  {
    month: "Feb",
    year: 2023,
    total_money: "110",
  },
  {
    month: "Mat",
    year: 2023,
    total_money: "150",
  },
  {
    month: "Apr",
    year: 2023,
    total_money: "150",
  },
  {
    month: "May",
    year: 2023,
    total_money: "140",
  },
  {
    month: "Jun",
    year: 2023,
    total_money: "190",
  },
  {
    month: "Jul",
    year: 2023,
    total_money: "200",
  },
  {
    month: "Aug",
    year: 2023,
    total_money: "190.50",
  },
  {
    month: "Sep",
    year: 2023,
    total_money: "190.9",
  },
  {
    month: "Oct",
    year: 2023,
    total_money: "210",
  },
  {
    month: "Nov",
    year: 2023,
    total_money: "215",
  },
  {
    month: "Dec",
    year: 2023,
    total_money: "250",
  },
];

const filter = (key) => {
  let items = [];
  data.filter(function (value) {
    items.push(value[key]);
  });
  return items;
};

const options = {
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
        return "$" + value;
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
    categories: filter("month"),
  },
};
const series = [
  {
    data: filter("total_money"),
    color: "#F25657",
  },
];
</script>
