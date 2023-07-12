// References: https://vuetifyjs.com/en/components/navigation-drawers/

<template>
  <!-- Sidebar -->
  <v-navigation-drawer v-model="drawer" :rail="rail" color="white" permanent @click="rail = false">
    <!-- <v-list-item
   
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
    </v-list> -->

    <!--  -->

    <v-list v-model:opened="open">
      <v-list-item prepend-icon="mdi-home" title="Home">
        <template v-slot:append>
          <v-btn variant="text" icon="mdi-chevron-left" @click.stop="rail = !rail"></v-btn>
        </template>
      </v-list-item>

      <v-list-group value="Users">
        <template v-slot:activator="{ props }">
          <v-list-item v-bind="props" prepend-icon="mdi-account-circle" title="Users"></v-list-item>
        </template>

        <!-- <v-list-group value="Admin">
          <template v-slot:activator="{ props }">
            <v-list-item v-bind="props" title="Admin"></v-list-item>
          </template>

        </v-list-group> -->
          <v-list-item v-for="([title, icon], i) in admins" :key="i" :title="title" :prepend-icon="icon"
            :value="title"></v-list-item>

        <v-list-group value="Actions">
          <template v-slot:activator="{ props }">
            <v-list-item v-bind="props" title="Actions"></v-list-item>
          </template>

          <v-list-item v-for="([title, icon], i) in cruds" :key="i" :value="title" :title="title"
            :prepend-icon="icon"></v-list-item>
        </v-list-group>
      </v-list-group>
    </v-list>
  </v-navigation-drawer>

  <!--  -->
</template>

<script setup>
import { ref } from "vue";

let rail = ref(true);
let drawer = ref(true);

const open = ref(['Users']);
const admins = ref([
  ['Management', 'mdi-account-multiple-outline'],
  ['Settings', 'mdi-cog-outline'],
]);
const cruds = ref([
  ['Create', 'mdi-plus-outline'],
  ['Read', 'mdi-file-outline'],
  ['Update', 'mdi-update'],
  ['Delete', 'mdi-delete'],
]);
</script>



