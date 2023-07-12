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
            @click="isShowForm = true"
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

  <create-staff-form :isShowForm="isShowForm" @closeForm="closeForm" />
</template>

<script setup>
import { ref } from "vue";
import CreateStaffForm from "@/components/form/CreateStaffForm.vue";

// Dialog of staff
const isShowForm = ref(false);
const closeForm = () => {
  isShowForm.value = false;
};

// Staff
const staff = ref([
  {
    first_name: "pich",
    last_name: "thun",
    possition: "too crazy",
    gender: "female",
    gmail: "crazy@gmail.com",
    password: "******",
  },
]);
</script>

<style></style>