<template>
  <base-alert v-model="success">
    <v-icon class="mr-2 text-h4 mdi mdi-check-circle"></v-icon>
    <h6 class="mt-2">Table created successfully!</h6>
  </base-alert>
  <v-card>
    <v-layout>
      <side-bar />
      <header-component title="Manage table" />
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
          <!-- <v-select
            :items="items"
            density="comfortable"
            label="Row Number"
          ></v-select> -->
        </v-card>
        <table-list-table
          v-if="tables.length > 0"
          :tables="tables"
        ></table-list-table>

        <div class="h-screen" v-else>
          <h4 class="text-center mt-5 text-orange-darken-4">
            Don't have any table.
          </h4>
        </div>
      </v-main>
    </v-layout>
  </v-card>
  <table-form :isShowForm="isShowForm" @closeForm="closeForm" />
</template>

<script setup>
import { onMounted, ref } from "vue";
import { useTableStore } from "@/stores/table";
import { storeToRefs } from "pinia";

// Variables
const isShowForm = ref(false);
const { getTables } = useTableStore();
const { tables, success } = storeToRefs(useTableStore());
// const items = ref([10, 15, 20, 25, 30, 35, 40]);

// methods
const closeForm = () => {
  isShowForm.value = false;
};

// Lifecycle hook
onMounted(() => {
  getTables();
});
</script>

<style>
</style>