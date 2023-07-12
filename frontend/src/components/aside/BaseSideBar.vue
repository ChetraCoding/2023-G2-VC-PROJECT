// References: https://vuetifyjs.com/en/components/navigation-drawers/

<template>
  <!-- Sidebar -->
  <v-navigation-drawer
    v-model="drawer"
    :rail="rail"
    color="white"
    permanent
    @click="rail = false"
  >
    <v-list-item
      class="text-orange-darken-4 mt-1"
      prepend-icon="mdi-account-star"
      :title="props.title"
    >
      <template v-slot:append>
        <v-btn
          variant="text"
          icon="mdi-chevron-left"
          @click.stop="rail = !rail"
        ></v-btn>
      </template>
    </v-list-item>
    <v-divider class="mt-1"></v-divider>

    <v-list density="compact" nav>

      <slot name="menu"></slot>

    </v-list>
  </v-navigation-drawer>
  <!--  -->
</template>

<script setup>
import {  defineProps, ref } from "vue";
const props = defineProps(['title'])
let rail = ref(true);
let drawer = ref(true);
</script>



