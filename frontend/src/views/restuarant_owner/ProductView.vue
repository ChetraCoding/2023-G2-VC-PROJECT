<template>
  <v-layout>
    <!-- Left side bar -->
    <res-owner-side-bar></res-owner-side-bar>

    <v-main class="ml-2">
      <!-- Header top -->
      <header-component title="Manage Product">
        <v-text-field class="search text-white rounded-lg" density="compact" variant="solo-none"
          label="Search for product..." append-inner-icon="mdi-magnify" single-line hide-details
          @click:append-inner="console.log('search')"></v-text-field>
      </header-component>

      <!-- Main container -->
      <main class="d-flex mt-2">
        <div class="d-flex flex-column mr-2 w-100">
          <!-- Tab categories -->
          <v-slide-group class="text-white">
            <v-slide-group-item v-slot="{ isSelected, toggle }">
              <v-btn :class="[isSelected ? 'bg-red-accent-2' : 'bg-grey-darken-2', 'my-1 mr-2 rounded-lg text-none']"
                @click="toggle">
                All
              </v-btn>
            </v-slide-group-item>
            <v-slide-group-item v-for="category in categories" :key="category.category_id"
              v-slot="{ isSelected, toggle }">
              <v-btn :class="[isSelected ? 'bg-red-accent-2' : 'bg-grey-darken-2', 'my-1 mr-2 rounded-lg text-none']"
                @click="toggle">
                {{ category.name }}
              </v-btn>
            </v-slide-group-item>
          </v-slide-group>

          <!-- List products card -->
          <div class="grid-container mt-2 gap-2">
            <product-res-owner-card v-for="product in products" :key="product.product_id" :product="product">
              <div class="d-flex justify-space-between align-center mt-2">
                <secondary-button @click="onEdit(product)">
                  <v-icon icon="mdi-square-edit-outline"
                    color="white" size="large"></v-icon>
                  Edit
                </secondary-button>
                <danger-button @click="isDelete = true; deleteId = product.product_id">
                  <v-icon icon="mdi-delete-forever" color="white" size="large"></v-icon>
                  Delete
                </danger-button>
              </div>
            </product-res-owner-card>
          </div>
        </div>

        <!-- Product Summary -->
        <summary-component class="mt-2" title="Product Summary">
          <template v-slot:btn>
            <secondary-button @click="dialog = true">
              <v-icon icon="mdi-plus-box-multiple" color="white" size="large"></v-icon>
              Add More
            </secondary-button>
          </template>
          <template v-slot:content>
            <div v-for="category in categories" :key="category.category_id"
              class="bg-grey-darken-2 mt-2 rounded-lg d-flex justify-space-between align-center">
              <div class="w-50 card-summary py-2 m-2 rounded-lg text-center">{{ category.name }}</div>
              <span class="mr-2">3 items</span>
            </div>
            <div class="bg-grey-darken-2 mt-4 py-3 rounded-lg d-flex justify-space-between align-center">
              <span class="ml-2">Total</span>
              <span class="mr-2">3 items</span>
            </div>
          </template>
        </summary-component>
      </main>
    </v-main>
  </v-layout>

  <!-- Form create product -->
  <product-form></product-form>

  <base-dialog v-model="isDelete" title="tips" ms="Are you sure you want to delete?">
    <danger-button @click="isDelete = false">
      <v-icon icon="mdi-close-box-multiple" color="white" size="large"></v-icon>
      Cancel
    </danger-button>
    <primary-button @click="deleted">
      <v-icon icon="mdi-checkbox-multiple-marked" color="white" size="large"></v-icon>
      Confirm
    </primary-button>
  </base-dialog>

  <!-- Create new product success -->
  <base-alert v-model="success">
    <v-icon class="mr-2 text-h4 mdi mdi-check-circle"></v-icon>
    <h5 class="mt-2">Created product succeefully!</h5>
  </base-alert>

  <!-- Update the product success -->
  <base-alert v-model="updateSuccess">
    <v-icon class="mr-2 text-h4 mdi mdi-check-circle"></v-icon>
    <h5 class="mt-2">Updated product succeefully!</h5>
  </base-alert>

  <!-- Delete the product success -->
  <base-alert v-model="deleteSuccess">
    <v-icon class="mr-2 text-h4 mdi mdi-check-circle"></v-icon>
    <h5 class="mt-2">Deleted product succeefully!</h5>
  </base-alert>
</template>

<script setup>
// Import
import { onMounted } from "vue";
import { useProductStore } from "@/stores/product";
import { useCategoryStore } from "@/stores/category";
import { storeToRefs } from "pinia";
import { ref } from "vue";

// Variables
const { getProducts, deleteProduct } = useProductStore();
const { categories } = storeToRefs(useCategoryStore());
const { products, dialog, productInForm, success, updateSuccess, deleteSuccess } = storeToRefs(useProductStore());
const isDelete = ref(false);
const deleteId = ref(null);

// Method
// Delete the product
let deleted = async () => {
  await deleteProduct(deleteId.value);
  isDelete.value = false;
}
// On click edit the product
const onEdit = (product) => {
  product.category_id = product.category.category_id;
  productInForm.value = { ...product };
  dialog.value = true;
} 

// Lifecycle hook
onMounted(() => {
  getProducts();
});
</script>

<style scoped>
.grid-container {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
}

.card-summary {
  background: #2C2C2C;
}

.search {
  background: #2C2C2C;
}
</style>