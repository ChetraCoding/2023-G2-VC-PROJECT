<template>
  <v-card>
    <v-layout>
      <side-bar />

      <header-component title="Products" />

      <v-main style="height: auto">
        <v-card class="pa-3 mt-3 d-flex justify-space-between">
          <v-icon
            icon="mdi-plus"
            size="40"
            class="rounded-lg"
            color="orange-darken-4"
          ></v-icon>
          <v-spacer></v-spacer>
          <v-text-field
            density="compact"
            label="Search name"
            append-inner-icon="mdi-magnify"
          ></v-text-field>
        </v-card>

        <product-list-table 
        v-if="productStore.products.length > 0"
        :products="productStore.products" 
        />

        <div class="h-screen" v-else>
          <h4 class="text-center mt-5 text-orange-darken-4">
            Don't have any product.
          </h4>
        </div>
      </v-main>
    </v-layout>
  </v-card>
</template>

<script setup>
// Import
import { onMounted } from "vue";
import { useProductStore } from "@/stores/product";

// Variables
const productStore = useProductStore();

// Lifecycle hook
onMounted(() => {
  productStore.getData();
});
</script>