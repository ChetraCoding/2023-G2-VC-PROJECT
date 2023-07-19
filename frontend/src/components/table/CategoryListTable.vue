
<template>
  <!-- <v-table >
    <thead>
      <tr>
        <th class="text-left text-black font-weight-bold" style="width: 100px">No.</th>
        <th class="text-left text-black font-weight-bold">Name</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(category, index) in props.categories" :key="category.id">
        <td>{{ index + 1 }}</td>
        <td>{{ category.name }}</td>
       
      </tr>
    </tbody>
  </v-table> -->
  <v-sheet class="bg-grey-darken-2 rounded-lg p-2" width="180" >
    <v-card class="p-4 bg-grey-darken-3 rounded-lg">

        <h6 class="font-weight-bold mt-1 text-center">{{ category.name }}</h6>
    </v-card>
       
        <slot></slot>
    </v-sheet>
</template>

<script setup>
import { defineProps } from "vue";
defineProps(['category']);

</script>

