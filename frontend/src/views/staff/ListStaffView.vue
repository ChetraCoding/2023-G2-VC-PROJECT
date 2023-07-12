<template>
  <v-card>
    <v-layout>
      <side-bar />

      <header-component title="Staff" />

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
            placeholder="Search staff"
            append-inner-icon="mdi-magnify"
          ></v-text-field>
        </v-card>

        <list-staff-table :staff="staff" />
      </v-main>
    </v-layout>
  </v-card>
</template>

<script setup>
import { ref } from "vue";
const staff = ref([
  {
    first_name: "sreypich",
    last_name: "thun",
    gender: "Female",
    possition: "Chef",
  },
  {
    first_name: "sreyka",
    last_name: "thor",
    gender: "Female",
    possition: "Waiter",
  },
  {
    first_name: "Liminhoo",
    last_name: "Jun",
    gender: "male",
    possition: "Cashier",
  },
  {
    first_name: "Linyi",
    last_name: "Love",
    gender: "male",
    possition: "Cashier",
  },
]);
</script>

<style></style>
