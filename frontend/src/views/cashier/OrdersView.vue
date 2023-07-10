<template>
  <!-- Order view -->
  <v-card>
    <v-layout>
      <base-side-bar title="Cashier">
        <template v-slot:menu>
          <v-list-item
            prepend-icon="mdi-food"
            title="Orders"
            name="OrdersListTable"
            value="orders"
            class="text-orange-darken-4"
            style="text-decoration: none"
            to="/orders"
          >
          </v-list-item>
        </template>
      </base-side-bar>

      <header-component title="Order List" />

      <v-main style="height: auto">
        <v-card class="pa-3 mt-3 d-flex justify-space-between">
          <v-spacer></v-spacer>
          <v-text-field
            density="compact"
            variant="outlined"
            placeholder="Search orders"
            append-inner-icon="mdi-magnify"
          ></v-text-field>
        </v-card>

        <order-list-table :orders="orders" />
      </v-main>
    </v-layout>
  </v-card>
</template>

<script setup>
import { ref } from "vue";

const orders = ref([
  {
    id: 1,
    table_number: "017",
    datetime: "2023-7-7 9:00:00",
    order_details: [
      {
        id: 1,
        order_id: 1,
        quantity: 5,
        product_customize: {
          id: 1,
          size: "small",
          price: 3,
          quantity: 100,
          product: {
            id: 1,
            name: "Pizza",
            barcode: "117",
            description: "this is description.",
            image: "qwertyuil",
            is_active: true,
          },
        },
      },
      {
        id: 2,
        order_id: 1,
        quantity: 3,
        product_customize: {
          id: 2,
          size: "large",
          price: 5,
          quantity: 40,
          product: {
            id: 2,
            name: "Noodle",
            barcode: "118",
            description: "this is description.",
            image: "qwertyuil",
            is_active: true,
          },
        },
      },
    ],
  },
  {
    id: 2,
    table_number: "019",
    datetime: "2023-7-7 9:30:00",
    order_details: [
      {
        id: 3,
        order_id: 2,
        quantity: 10,
        product_customize: {
          id: 1,
          size: "small",
          price: 3,
          quantity: 100,
          product: {
            id: 1,
            name: "Pizza",
            barcode: "117",
            description: "this is description.",
            image: "qwertyuil",
            is_active: true,
          },
        },
      },
      {
        id: 4,
        order_id: 2,
        quantity: 10,
        product_customize: {
          id: 2,
          size: "large",
          price: 5,
          quantity: 40,
          product: {
            id: 2,
            name: "Noodle",
            barcode: "118",
            description: "this is description.",
            image: "qwertyuil",
            is_active: true,
          },
        },
      },
      {
        id: 5,
        order_id: 2,
        quantity: 10,
        product_customize: {
          id: 2,
          size: "large",
          price: 5,
          quantity: 40,
          product: {
            id: 2,
            name: "Noodle",
            barcode: "118",
            description: "this is description.",
            image: "qwertyuil",
            is_active: true,
          },
        },
      },
    ],
  },
  {
    id: 3,
    table_number: "020",
    datetime: "2023-8-7 10:30:00",
    order_details: [
      {
        id: 6,
        order_id: 3,
        quantity: 5,
        product_customize: {
          id: 1,
          size: "small",
          price: 3,
          quantity: 100,
          product: {
            id: 1,
            name: "Pizza",
            barcode: "117",
            description: "this is description.",
            image: "qwertyuil",
            is_active: true,
          },
        },
      },
      {
        id: 7,
        order_id: 3,
        quantity: 6,
        product_customize: {
          id: 3,
          size: "large",
          price: 5,
          quantity: 40,
          product: {
            id: 2,
            name: "Noodle",
            barcode: "118",
            description: "this is description.",
            image: "qwertyuil",
            is_active: true,
          },
        },
      },
    ],
  },
]);

</script>
