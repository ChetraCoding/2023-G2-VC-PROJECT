<template>
  <v-table>
    <thead>
      <tr>
        <th class="bg-white text-left text-black font-weight-bold">
          First Name
        </th>
        <th class="bg-white text-left text-black font-weight-bold">
          Last Name
        </th>
        <th class="bg-white text-left text-black font-weight-bold">Gender</th>
        <th class="bg-white text-left text-black font-weight-bold">
          Possition
        </th>
        <th class="bg-white text-left text-black font-weight-bold">Action</th>
      </tr>
    </thead>

    <tbody>
      <tr v-for="person in props.staff" :key="person">
        <td>{{ person.first_name }}</td>
        <td>{{ person.last_name }}</td>
        <td>{{ person.gender }}</td>
        <td>{{ person.possition }}</td>

        <td>
          <v-icon
            icon="mdi-square-edit-outline"
            color="blue"
            class="mr-3"
          ></v-icon>
          <v-icon icon="mdi-delete" color="red"></v-icon>
        </td>
      </tr>
    </tbody>
  </v-table>
</template>

<script setup>
import { defineProps } from "vue";

const props = defineProps(["staff"]);
</script>

<style></style>
