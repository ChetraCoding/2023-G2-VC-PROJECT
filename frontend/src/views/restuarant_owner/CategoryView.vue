<template>
  <v-card>
    <v-layout>
      <side-bar />

      <header-component title="Category" />

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

        <category-list-table
          :categories="categoryStore.categories"
        ></category-list-table>
      </v-main>
    </v-layout>
  </v-card>
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