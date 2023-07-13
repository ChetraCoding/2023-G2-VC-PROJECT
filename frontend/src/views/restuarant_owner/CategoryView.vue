<template>
  <base-alert v-model="success">
    <v-icon class="mr-2 text-h4 mdi mdi-check-circle"></v-icon>
    <h6 class="mt-2">Category created successfully!</h6>
  </base-alert>
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
            density="compact"
            label="Row Number"
          ></v-select>
        </v-card>
        <category-list-table v-if="categories.length > 0" :categories="categories"></category-list-table>
        <div class="h-screen" v-else>
          <h4 class="text-center mt-5 text-orange-darken-4">
            Don't have any category.
          </h4>
        </div>
      </v-main>
    </v-layout>
  </v-card>
  <category-form :isShowForm="isShowForm" @closeForm="closeForm" />
</template>

<script setup>
import { onMounted, ref } from "vue";
import { useCategoryStore } from "@/stores/category";
import { storeToRefs } from "pinia";

// Variables
const { getCategory } = useCategoryStore();
const { categories, success } = storeToRefs(useCategoryStore());
const isShowForm = ref(false);
const items = ref([10, 15, 20, 25, 30, 35, 40]);

// Methods
const closeForm = () => {
  isShowForm.value = false;
};

// Lifecycle hook
onMounted(() => {
  getCategory();
});
</script>