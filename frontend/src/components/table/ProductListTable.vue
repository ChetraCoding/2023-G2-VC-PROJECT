// Reference : https://vuetifyjs.com/en/components/tables/

<template>

  <!--Don't have project-->
  <div class="h-screen" v-if="products.length===0">
          <h4 class="text-center mt-5 text-orange-darken-4">Don't have any product.</h4>
        </div>
  <!-- Create table of list products -->
  <v-table v-else>
    <thead>
      <tr>
        <th class="text-left text-black font-weight-bold">No.</th>
        <th class="text-left text-black font-weight-bold">Name</th>
        <th class="text-left text-black font-weight-bold">Barcode</th>
        <th class="text-left text-black font-weight-bold">Category</th>
        <th class="text-left text-black font-weight-bold">Description</th>
        <th class="text-left text-black font-weight-bold" style="width: 30px;">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(product, index) in props.products" :key="product.product_id">
        <td>{{ index + 1 }}</td>
        <td>{{ product.name }}</td>
        <td>{{ product.barcode}}</td>
        <td>{{ product.category }}</td>
        <td>{{ product.description }}</td>   
        <td>
          <div class="d-flex">
            <div class="d-flex align-center">
              <v-icon
                icon="mdi-square-edit-outline"
                color="blue"
                class="mr-3"
              ></v-icon>
              <v-icon icon="mdi-delete" color="red"></v-icon>
            </div>
          </div>
        </td>
      </tr>
    </tbody>
  </v-table>
  <!-- Close -->
</template>

<script setup>
import { defineProps} from "vue";

// Variables
const props = defineProps(["products"]);

</script>