<template>
  <v-snackbar
    rounded="xl"
    :timeout="2000"
    location="top"
    color="orange-darken-4"
  >
    <div class="orange-darken-4 d-flex justify-center align-center">
      <v-icon class="mr-2 text-h4 mdi mdi-check-circle"></v-icon>
      <h6 class="mt-1">Created table is succeed !</h6>
    </div>
  </v-snackbar>
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
            @click="isShowForm = true"
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
  <table-form
    :isShowForm="isShowForm"
    @closeForm="closeForm"
    @sendData="add"
  ></table-form>
</template>

<script setup>
// =========back-end-list-talbe==========
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

// ===========front-end-list-talbe============
import { ref } from "vue";
const items = ref([10, 15, 20, 25, 30, 35, 40]);
const tables = ref([
  { id: 1, table_number: 1 },
  { id: 2, table_number: 2 },
  { id: 3, table_number: 3 },
]);

// ==========back-end-create-table ===========
// import { useTableStore, onMounted } from "@/stores/table";
//variable
// const isShowForm = ref(false);
// const tableStore = useTableStore();

// method
// const closeForm = () => {
//   return (isShowForm.value = false);
// };

// =========front-end-create-table===========
const isShowForm = ref(false);
const add = (value) => {
  tables.value.push(value);
  console.log(value);
};

const closeForm = () => {
  return (isShowForm.value = false);
};
</script>

