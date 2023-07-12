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
      title="Administration"
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
      <v-list-item
        prepend-icon="mdi-view-dashboard"
        title="Dashboard"
        value="dashboard"
        class="text-orange-darken-4 "
        to="/"
        style="text-decoration: none"
      >
      </v-list-item>

      <v-list-item
        prepend-icon="mdi-food"
        title="Categories"
        value="categories"
        class="text-orange-darken-4"
        style="text-decoration: none"
        to="/category"
      >
      </v-list-item>

      <v-list-item
        prepend-icon="mdi-cube"
        title="Products"
        value="products"
        class="text-orange-darken-4"
        to="/product"
        style="text-decoration: none"
      >
      </v-list-item>

      <v-list-item
        prepend-icon="mdi-table"
        title="Tables"
        value="tables"
        to="table"
        class="text-orange-darken-4"
      >
      </v-list-item>

      <v-list-item
        prepend-icon="mdi-account-group"
        title="Staff"
        name="ListStaffTable"
        value="staff"
        class="text-orange-darken-4"
        style="text-decoration: none"
        to="/staff"
      >
      </v-list-item>

      <v-list-item
        prepend-icon="mdi-file-document"
        title="Reports"
        value="reports"
        class="text-orange-darken-4"
      >
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
  <!--  -->
</template>

<script setup>
import { ref } from "vue";

let rail = ref(true);
let drawer = ref(true);
</script>



