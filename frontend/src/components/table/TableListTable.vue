// Reference : https://vuetifyjs.com/en/components/tables/

<template>
<!-- Create table of list Tables -->
  <v-table >
    <thead>
      <tr>
        <th class="text-left text-black font-weight-bold" style="width: 100px">No.</th>
        <th class="text-left text-black font-weight-bold">Number of Table</th>
        <th class="text-left text-black font-weight-bold" style="width: 100px">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(table, index) in props.tables" :key="table.id">
        <td>{{ index + 1 }}</td>
        <td>{{ table.table_number }}</td>
        <td> 
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
const props = defineProps(['tables']);
</script>

