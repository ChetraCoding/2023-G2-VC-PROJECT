<template>
  <v-snackbar
    rounded="xl"
    v-model="categoryStore.success"
    :timeout="2000"
    location="top"
    color="orange-darken-4"
  >
    <div class="orange-darken-4 d-flex justify-center align-center">
      <v-icon class="mr-2 text-h4 mdi mdi-check-circle"></v-icon>
      <h6 class="mt-1">Category created successfully!</h6>
    </div>
  </v-snackbar>

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
            @click="isShowForm = true"
          ></v-icon>
          <v-spacer></v-spacer>
          <v-select
            :items="items"
            density="comfortable"
            label="Row Number"
          ></v-select>
        </v-card>

        <category-list-table
        v-if="categoryStore.categories.length > 0"
          :categories="categoryStore.categories"
        ></category-list-table>
        
        <div class="h-screen" v-else>
          <h4 class="text-center mt-5 text-orange-darken-4">Don't have any category.</h4>
        </div>
      </v-main>
    </v-layout>
  </v-card>
  <category-form :isShowForm="isShowForm" @closeForm="closeForm" />
</template>

<script setup>
import { onMounted, ref } from "vue";
import { useCategoryStore } from "@/stores/category";

// Variables
const categoryStore = useCategoryStore();
const isShowForm = ref(false);
const items = ref([10, 15, 20, 25, 30, 35, 40]);

// Methods
const closeForm = () => {
  isShowForm.value = false;
};

// Lifecycle hook
onMounted(() => {
  categoryStore.getData();
});
</script>

<style>
</style>