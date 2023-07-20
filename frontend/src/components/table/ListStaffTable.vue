<template>
  <v-card
    class="d-flex justify-space-between align-center pa-2 ma-2 bg-grey-darken-2 rounded-lg"
  >
    <span class="w-15 ml-2">{{ user.first_name }}</span>
    <span class="w-15">{{ user.last_name }}</span>
    <span class="w-15">{{ user.gender }}</span>
    <span class="w-20">{{ user.email }}</span>
    <span class="w-15 pl-5">{{ user.role }}</span>
    <v-card-actions class="w-20 d-flex justify-end">
      <!--Edit button-->
      <dark-button>
        <v-icon icon="mdi-square-edit-outline"></v-icon>
        Edit
      </dark-button>
      <!--Delete button-->
      <danger-button>
        <v-icon icon="mdi-delete-forever"></v-icon>
        Delete
      </danger-button>
    </v-card-actions>
    <!--Action-->
  </v-card>
</template>

<script setup>
// Import
import { defineProps } from "vue";
// Variables
defineProps(["user"]);
</script>

<style scoped>
.card-summary {
  background: #2c2c2c;
}
.w-15 {
  width: 15%;
}
.w-20 {
  width: 20%;
}
</style>
