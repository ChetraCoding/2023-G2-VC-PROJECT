// References: https://vuetifyjs.com/en/components/navigation-drawers/

<template>
  <v-navigation-drawer class="rounded-lg bg-grey-darken-2" width="110">
    <div class="d-flex flex-column align-center"> 
      <v-list-item v-for="item in menu" :key="item" :to="item.link" active-class="active" width="100px" height="80px"
        class="menu-items text-white rounded-lg text-decoration-none">
        <div class="d-flex flex-column align-center" width="'10px'">
          <v-icon :icon="item.icon"></v-icon>
          <span class="font-inter text-subtitle-2">{{ item.title }}</span>
        </div>
      </v-list-item>
    </div>
  </v-navigation-drawer>
</template>

<script setup>
import { ref } from "vue";

const menu = ref([
  {
    link: '/',
    title: 'Home',
    icon: 'mdi-home'
  },
  {
    link: '/product',
    title: 'Product',
    icon: 'mdi-cube'
  },
  {
    link: '/category',
    title: 'Category',
    icon: 'mdi-view-grid'
  },
  {
    link: '/table',
    title: 'Table',
    icon: 'mdi-table'
  },
  {
    link: '/staff',
    title: 'Staff',
    icon: 'mdi-account-group'
  },
  {
    link: '/sale',
    title: 'Sale',
    icon: 'mdi-chart-line'
  },
  {
    link: '/money',
    title: 'Money',
    icon: 'mdi-currency-usd'
  },
])
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400&display=swap');
.menu-items:hover {
  color: white;
}
.active {
  background: #F25657;
}
.font-inter {
  font-family: 'Inter', sans-serif !important;
}
</style>