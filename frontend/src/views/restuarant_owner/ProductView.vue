<template>
  <v-card>
    <v-layout>
      <side-bar />

      <header-component title="Products" />

      <v-main style="height: auto">
        <v-card class="pa-3 mt-3 d-flex justify-space-between">
          <v-icon
            icon="mdi-plus"
            size="40"
            class="rounded-lg"
            color="orange-darken-4"
          ></v-icon>
          <v-spacer></v-spacer>
          <v-text-field
            density="compact"
            variant="outlined"
            append-inner-icon="mdi-magnify"
          ></v-text-field>
        </v-card>

        <product-list-table :products="products" />
      </v-main>
    </v-layout>
  </v-card>
</template>

<script setup>
import { ref } from "vue";

let products = ref([
  {
    name: "Frozen Yogurt",
    calories: 159,
  },
  {
    name: "Ice cream sandwich",
    calories: 237,
  },
  {
    name: "Eclair",
    calories: 262,
  },
  {
    name: "Cupcake",
    calories: 305,
  },
  {
    name: "Gingerbread",
    calories: 356,
  },
  {
    name: "Jelly bean",
    calories: 375,
  },
  {
    name: "Lollipop",
    calories: 392,
  },
  {
    name: "Honeycomb",
    calories: 408,
  },
  {
    name: "Donut",
    calories: 452,
  },
  {
    name: "KitKat",
    calories: 518,
  },
  {
    name: "KitKat",
    calories: 518,
  },
  {
    name: "KitKat",
    calories: 518,
  },
  {
    name: "KitKat",
    calories: 518,
  },
]);
</script>