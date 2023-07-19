<template>
  <v-card
    v-for="person in props.staff"
    :key="person"
    class="d-flex pa-2 ma-2 bg-grey-darken-2 rounded-lg"
  >
    <v-card-text class="d-flex justify-space-between">
      <span>{{ person.first_name }}</span>
      <span>{{ person.last_name }}</span>
      <span>{{ person.gender }}</span>
      <span>{{ person.email }}</span>
      <span>{{ person.role }}</span>
    </v-card-text>
    <v-card-actions>
      <danger-button
        ><v-icon icon="mdi-delete-forever"></v-icon> Delete</danger-button
      >
    </v-card-actions>
  </v-card>

  <summary-component class="mt-2" title="Staff Summary">
    <template v-slot:btn>
      <secondary-button @click="dialog = true">
        <v-icon
          icon="mdi-plus-box-multiple"
          color="white"
          size="large"
        ></v-icon>
        Add More
      </secondary-button>
    </template>
    <template v-slot:content>
      <div
        v-for="person in props.staff"
        :key="person"
        class="bg-grey-darken-2 mt-2 rounded-lg d-flex justify-space-between align-center"
      >
        <div class="w-50 card-summary py-2 m-2 rounded-lg text-center">
          {{ person.role }}
        </div>
        <span class="mr-2">3 items</span>
      </div>
      <div
        class="bg-grey-darken-2 mt-4 py-3 rounded-lg d-flex justify-space-between align-center"
      >
        <span class="ml-2">Total</span>
        <span class="mr-2">3 items</span>
      </div>
    </template>
  </summary-component>
</template>

<script setup>
import { defineProps } from "vue";

const props = defineProps(["staff"]);
</script>

<style></style>
