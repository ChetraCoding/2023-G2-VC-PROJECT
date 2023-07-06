// Reference : https://vuetifyjs.com/en/components/tables/

<template>
<!-- Create table of list products -->
  <v-table >
    <thead>
      <tr>
        <th class="text-left text-black font-weight-bold">Name</th>
        <th class="text-left text-black font-weight-bold">Calories</th>
        <th class="text-left text-black font-weight-bold">Description</th>
        <th class="text-left text-black font-weight-bold">Quantity</th>
        <th class="text-left text-black font-weight-bold">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="product in props.products" :key="product.name">
        <td>{{ product.name }}</td>
        <td>{{ product.calories }}</td>
        <td>{{ product.name }}</td>
        <td>{{ 30 }}</td>
        <td > 
          <v-icon icon="mdi-square-edit-outline" color="blue" class="mr-3"></v-icon>
          <v-icon icon="mdi-delete" color="red"></v-icon>
        </td>
      </tr>
    </tbody>
  </v-table>
  <!-- Close -->
</template>

<script setup>
import { defineProps } from "vue";

const props = defineProps(['products']);

</script>

