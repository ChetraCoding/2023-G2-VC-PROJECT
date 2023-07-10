<template>
  <v-card>
    <v-layout>
      <side-bar />
      <header-component title="Table" />
      <v-main style="height: auto">
        <v-card class="pa-3 mt-3 d-flex justify-space-between">
          <v-icon
            icon="mdi-plus"
            size="40"
            class="rounded-lg"
            color="orange-darken-4"
          ></v-icon>
          <v-spacer></v-spacer>
          <v-select
            :items="items"
            density="comfortable"
            label="Row Number"
          ></v-select>
        </v-card>
        <!-- ======== back-end====== -->
        <!-- <table-list-table
        v-if="tableStore.tables.length > 0"
          :tables="tableStore.tables"
        ></table-list-table> -->

        <!-- <div class="h-screen" v-else>
          <h4 class="text-center mt-5 text-orange-darken-4">Don't have any table.</h4>
        </div>  -->

        <!-- ======== front-end====== -->
        <table-list-table
          :tables="tables"
          v-if="tables.length != 0"
        ></table-list-table>
        <div class="h-screen" v-else>
          <h4 class="text-center mt-5 text-orange-darken-4">
            Don't have any table.
          </h4>
        </div>
      </v-main>
    </v-layout>
  </v-card>
</template>

<script setup>
// =========back-end==========
// import { onMounted, ref } from "vue";
// import { useTableStore } from "@/stores/table";


// Variables
// =====back-end=======
// const tableStore = useTableStore();

  // Lifecycle hook
  // ======back-end==========
  // onMounted(() => {
    //   tableStore.getData();
  // });

import { ref } from "vue";
const items = ref([10, 15, 20, 25, 30, 35, 40]);
const tables = ref([
  { id: 1, number: 1 },
  { id: 2, number: 2 },
  { id: 3, number: 3 },
]);

</script>

<style>
</style>