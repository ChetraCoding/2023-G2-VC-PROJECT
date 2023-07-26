<template>
  <v-layout>
    <res-owner-side-bar></res-owner-side-bar>
    <!-- Left side bar -->
    <side-bar />

    <v-main class="ml-2">
      <!-- Header top -->
      <header-component title="Manage Money"> </header-component>
      <!-- Main container -->
      <main class="d-flex mt-2">
        <!-- <div class="w-75 d-flex flex-column"></div>  -->
        <div class="w-100 d-flex flex-column">
          <!-- Tab of month  -->
          <v-slide-group>
            <v-slide-group-item>
              <secondary-button class="ml-2 mt-2">2018</secondary-button>
              <secondary-button class="ml-2 mt-2">2019</secondary-button>
              <secondary-button class="ml-2 mt-2">2020</secondary-button>
              <secondary-button class="ml-2 mt-2">2021</secondary-button>
              <secondary-button class="ml-2 mt-2">2022</secondary-button>
              <secondary-button class="ml-2 mt-2">2023</secondary-button>
            </v-slide-group-item>
          </v-slide-group>
          <!-- <money-chart ></money-chart> -->
          <div>
            <apexchart
              height="500"
              type="bar"
              :options="options"
              :series="series"
            ></apexchart>
          </div>
        </div>
        <!--Money summary -->
        <summary-component class="mt-2" title="Money Summary">
          <template v-slot:content>
            <div v-for="money in moneyReport" :key="money" class="bg-grey-darken-2 mt-2 rounded-lg d-flex justify-space-between align-center">
              <div class="w-50 card-summary py-2 m-2 rounded-lg text-center">{{money.month}}</div>
              <span class="mr-2">{{money.total_money}}$</span>
            </div>
            <div
              class="bg-grey-darken-2 mt-4 py-3 rounded-lg d-flex justify-space-between align-center"
            >
              <span class="ml-2">Total</span>
              <span class="mr-2">{{getTotalMoney()}} $</span>
            </div>
          </template>
        </summary-component>
      </main>
    </v-main>
  </v-layout>
</template>
<script setup>
// const data = [
//   {
//     month: "Jan",
//     year: 2023,
//     total_money: "100",
//   },
//   {
//     month: "Feb",
//     year: 2023,
//     total_money: "110",
//   },
//   {
//     month: "Mat",
//     year: 2023,
//     total_money: "150",
//   },
//   {
//     month: "Apr",
//     year: 2023,
//     total_money: "150",
//   },
//   {
//     month: "May",
//     year: 2023,
//     total_money: "140",
//   },
//   {
//     month: "Jun",
//     year: 2023,
//     total_money: "190",
//   },
//   {
//     month: "Jul",
//     year: 2023,
//     total_money: "200",
//   },
//   {
//     month: "Aug",
//     year: 2023,
//     total_money: "190.50",
//   },
//   {
//     month: "Sep",
//     year: 2023,
//     total_money: "190.9",
//   },
//   {
//     month: "Oct",
//     year: 2023,
//     total_money: "210",
//   },
//   {
//     month: "Nov",
//     year: 2023,
//     total_money: "215",
//   },
//   {
//     month: "Dec",
//     year: 2023,
//     total_money: "250",
//   },
// ];
import { onMounted, ref } from "vue";
import { useMoneyStore } from "@/stores/money";
import { storeToRefs } from "pinia";

const { getMoneyByYear } = useMoneyStore();
const { moneyReport } = storeToRefs(useMoneyStore());

const filter = (key) => {
  const items = ref([]);
  moneyReport.value.filter(function (value) {
    items.value.push(value[key]);
  });
  return items.value;
};

const options = ref({
  plotOptions: {
    bar: {
      columnWidth: "50px",
      borderRadiusApplication: "end",
      borderRadiusWhenStacked: "last",
      borderRadius: 10,
    },
  },
  yaxis: {
    // min: 0,
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
});

const series = ref([
  {
    data: filter("total_money"),
    color: "#F25657",
  },
]);
// Variable
const year = ref("2023");

// method

const getTotalMoney = () => {
  const sumTotalMoney = ref(0);
  for (let money of moneyReport.value) {
    sumTotalMoney.value += money.total_money;
    console.log("jdhfsjkhfksdhk",moneyReport.value);
  }
  return sumTotalMoney.value;
}
// Lifecycle hook
onMounted(() => {
  getMoneyByYear(year.value);

});
</script>
