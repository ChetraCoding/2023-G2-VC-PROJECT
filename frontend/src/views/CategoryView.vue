<template>
  <v-container class="m-3 m-auto">
    <v-card class="d-flex">
      <v-col class="mt-3">
        <v-btn class="btn-add bg-orange">
          <span class="glyphicon text-light glyphicon-plus"></span>
        </v-btn>
      </v-col>
      <v-col class="">
        <v-select
          :items="items"
          density="comfortable"
          label="Row Number"
        ></v-select>
      </v-col>
    </v-card>
    <div class="mt-1">
      <category-list-table :categories="categories"></category-list-table>
    </div>
  </v-container>
</template>

<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";

let items = ref([10, 15, 20, 25, 30, 35, 40]);
let categories = ref([]);
let categoryAPI = "http://127.0.0.1:8000/api/listCategory";

let fetchCategory = () => {
  axios.get(categoryAPI).then((response) => {
    categories.value = response.data.data;
  });
};
onMounted(() => {
  fetchCategory();
});

</script>

<style>
.glyphicon-edit,
.glyphicon-trash,
.glyphicon-plus {
  font-size: x-large;
  cursor: pointer;
}
</style>