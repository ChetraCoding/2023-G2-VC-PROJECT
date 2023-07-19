<template>
  <base-alert v-model="success">
    <v-icon class="mr-2 text-h4 mdi mdi-check-circle"></v-icon>
    <h6 class="mt-2">Category created successfully!</h6>
  </base-alert>
  <v-layout>
    <!-- Left side bar -->
    <res-owner-side-bar></res-owner-side-bar>
    <v-main class="ml-2">
      <header-component title="Manage Category">
        <v-text-field
          class="search text-white rounded-lg"
          density="compact"
          variant="solo-none"
          label="Search for category..."
          append-inner-icon="mdi-magnify"
          single-line
          hide-details
          @click:append-inner="console.log('search')"
        ></v-text-field>
      </header-component>

      <!-- Main container -->
      <main class="d-flex mt-2" v-if="categories.length > 0">
        <div class="d-flex flex-column">
          
          <!-- list category -->
          <div class="grid-container mt-2 gap-2">
            <category-card
              v-for="category in categories"
              :key="category.category_id"
              :category="category"
            >
              <div class="d-flex justify-space-between align-center mt-2">
                <secondary-button>
                  <v-icon
                    icon="mdi-square-edit-outline"
                    color="white"
                    size="large"
                  ></v-icon>
                  Edit
                </secondary-button>
                <danger-button>
                  <v-icon
                    icon="mdi-delete-forever"
                    color="white"
                    size="large"
                  ></v-icon>
                  Delete
                </danger-button>
              </div>
            </category-card>
          </div>
        </div>

        <!-- Category Summary -->
        <summary-component class="mt-2" title="Category Summary">
          <template v-slot:btn>
            <secondary-button @click="isShowForm = true">
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
              class="bg-grey-darken-2 mt-5 py-3 rounded-lg d-flex justify-space-between align-center"
            >
              <span class="ml-2">Total</span>
              <span class="mr-2">{{ categories.length }} items</span>
            </div>
          </template>
        </summary-component>
      </main>

      <!-- list category empty -->
      <div class="h-screen" v-else>
        <h4 class="text-center mt-5 text-white">Don't have any category.</h4>
      </div>
    </v-main>
  </v-layout>

  <!-- form create category -->
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

// Methods
const closeForm = () => {
  isShowForm.value = false;
};

// Lifecycle hook
onMounted(() => {
  getCategory();
});
</script>

<style>
.grid-container {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
}
.card-summary {
  background: #2c2c2c;
}
.search {
  background: #2c2c2c;
}
</style>