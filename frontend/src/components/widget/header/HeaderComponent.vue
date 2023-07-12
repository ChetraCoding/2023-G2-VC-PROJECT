<template>
  <v-app-bar 
  class=" font-weight-bold text-orange-darken-4" 
  :title="props.title">
    <v-list-item
      prepend-avatar="https://lh3.googleusercontent.com/a/AAcHTtfN3oQlBetkAoqE3hrI8xYh9NARyq7lyYDGFBNnoL5Jfg=s288-c-no"
    />
  </v-app-bar>
</template>

<script setup>
import { defineProps } from "vue";

const props = defineProps(["title"]);
</script>