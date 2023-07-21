<template>
  <v-layout>
    <!-- Sidebar -->
    <base-side-bar :menus="menus"></base-side-bar>

    <v-main class="ml-2">
      <header-component title="Manage order" />

      <!-- Main container -->
      <main class="d-flex mt-2">
        <div class="d-flex flex-column" style="width: 100%">
          <div class="d-flex justify-space-between align-center">
            <v-slide-group class="text-white">
              <v-slide-group-item v-slot="{ isSelected, toggle }">
                <v-btn :class="[
                  isSelected ? 'bg-red-accent-2' : 'bg-grey-darken-2',
                  'my-1 mr-2 rounded-lg text-none',
                ]" @click="toggle">
                  Done
                </v-btn>
              </v-slide-group-item>
              <v-slide-group-item v-slot="{ isSelected, toggle }">
                <v-btn :class="[
                  isSelected ? 'bg-red-accent-2' : 'bg-grey-darken-2',
                  'my-1 mr-2 rounded-lg text-none',
                ]" @click="toggle">
                  Don't
                </v-btn>
              </v-slide-group-item>
            </v-slide-group>
            <h6 class="text-white mr-3" v-if="orders.length > 1">
              Total {{ orders.length }} items
            </h6>
            <h6 class="text-white mr-3" v-else>
              Total {{ orders.length }} item
            </h6>
          </div>

          <!-- List orders card -->
          <div class="d-flex flex-wrap gap-2 mt-2" v-if="orders.length > 0">
            <chef-order-card v-for="order in orders" :key="order.order_id" :order="order">
            </chef-order-card>
          </div>
          <!-- No order -->
          <div v-else class="h-screen">
            <h4 class="text-center mt-5 text-white">Don't have any order.</h4>
          </div>
        </div>
      </main>
    </v-main>
  </v-layout>

  <!-- Alert message -->
  <base-alert v-model="success">
    <v-icon class="mr-2 text-h4 mdi mdi-check-circle"></v-icon>
    <h6 class="mt-2">Completed order successfully!</h6>
  </base-alert>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { useOrderStore } from "@/stores/order";
import { storeToRefs } from "pinia";

// Variables
const { getOrdersNotCompleted } = useOrderStore();
const { orders, success } = storeToRefs(useOrderStore());

const menus = ref([
  {
    link: "/chef",
    title: "Order",
    icon: "mdi-storefront-plus",
  }
]);

// setInterval(() => {
//   getOrdersNotCompleted();
// }, 6000);

// Lifecycle hook
onMounted(() => {
  getOrdersNotCompleted();
});
</script>