<template>
  <div v-if="categories.length === 0" class="p-5">
    <h1 class="display-4 text-center text-orange text-bold">No Category</h1>
  </div>
  <v-table class="table table-hover" v-else>
    <thead>
      <tr>
        <th style="width: 100px">N</th>
        <th scope="col">Name</th>
        <th style="width: 100px"></th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(cate, index) in categories" :key="cate" class="">
        <td>{{ index + 1 }}</td>
        <td>{{ cate.name }}</td>
        <td class="text-right">
          <span
            class="mr-4 glyphicon text-info glyphicon-edit hover-cursor-pointer;-"
          ></span>
          <span class="glyphicon text-danger glyphicon-trash"></span>
        </td>
      </tr>
    </tbody>
  </v-table>
</template>

<script setup>
import { defineProps } from "vue";

defineProps(["categories"]);
</script>

<style>
td th {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
tr th {
  background: rgb(198, 196, 196);
}
tr:hover {
  border-collapse: collapse;
  background-color: gainsboro;
}
</style>