<template>
  <v-app-bar class="font-weight-bold text-orange-darken-4" :title="props.title">
    <v-list-item v-if="user" :prepend-avatar="user.image" />
  </v-app-bar>
</template>

<script setup>
import { defineProps } from "vue";
import { useUserStore } from "@/stores/user";
import { storeToRefs } from "pinia";

// Variable
const props = defineProps(["title"]);
const { user } = storeToRefs(useUserStore());

</script>