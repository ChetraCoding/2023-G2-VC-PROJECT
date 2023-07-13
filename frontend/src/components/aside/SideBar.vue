// References: https://vuetifyjs.com/en/components/navigation-drawers/

<template>
  <v-navigation-drawer :class="rail ? '' : 'slide'" v-model="drawer" :rail="rail" permanent @click="rail = false">
    <v-list-item class="text-orange-darken-4 mt-1" prepend-icon="mdi-account-star" title="Administration">
      <template v-slot:append>
        <v-btn variant="text" icon="mdi-chevron-left" @click.stop="rail = !rail"></v-btn>
      </template>
    </v-list-item>
    <v-divider class="mt-1"></v-divider>

    <v-list density="compact" nav>
      <!-- <v-list-item to="/" prepend-icon="mdi-view-dashboard" title="Dashboard" value="dashboard"
        class="text-orange-darken-4" style="text-decoration: none">
      </v-list-item> -->

      <v-list-item to="/category" prepend-icon="mdi-food" title="Categories" value="categories"
        class="text-orange-darken-4" style="text-decoration: none">
      </v-list-item>

      <v-list-item to="/product" prepend-icon="mdi-cube" title="Products" value="products"
        class="text-orange-darken-4" style="text-decoration: none">
      </v-list-item>

      <v-list-item to="/table" prepend-icon="mdi-table" title="Tables" value="tables"
        class="text-orange-darken-4" style="text-decoration: none">
      </v-list-item>

      <v-list-item to="/staff" prepend-icon="mdi-account-group" title="Staff" name="ListStaffTable"
        value="staff" class="text-orange-darken-4" style="text-decoration: none">
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script setup>
import { ref } from "vue";
// Variables
let rail = ref(false);
let drawer = ref(true);

</script>

<style scoped>
.slide {
  border-radius: 0px 15px 15px 0px;
}

</style>