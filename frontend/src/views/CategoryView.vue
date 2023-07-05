<template>
  <v-card class="d-flex mx-4">
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
  <div class="mx-4 mt-4">
    <category-list-table
      :categories="categoryStore.categories"
    ></category-list-table>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { useCategoryStore } from "@/stores/category";

const categoryStore = useCategoryStore();

let items = ref([10, 15, 20, 25, 30, 35, 40]);

onMounted(() => {
  categoryStore.getCategories();
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