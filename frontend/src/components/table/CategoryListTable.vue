// Reference : https://vuetifyjs.com/en/components/tables/

<template>
<!-- Create table of list products -->
  <v-table >
    <thead>
      <tr>
        <th class="text-left text-black font-weight-bold" style="width: 100px">No.</th>
        <th class="text-left text-black font-weight-bold">Name</th>
        <!-- <th class="text-left text-black font-weight-bold" style="width: 100px">Action</th> -->
      </tr>
    </thead>
    <tbody>
      <tr v-for="(category, index) in props.categories" :key="category.id">
        <td>{{ index + 1 }}</td>
        <td>{{ category.name }}</td>
        <!-- <td > 
          <v-icon icon="mdi-square-edit-outline" color="blue" class="mr-3"></v-icon>
          <v-icon icon="mdi-delete" color="red"></v-icon>
        </td> -->
      </tr>
    </tbody>
  </v-table>
  <!-- Close -->
</template>

<script setup>
import { defineProps } from "vue";

const props = defineProps(['categories']);

</script>

