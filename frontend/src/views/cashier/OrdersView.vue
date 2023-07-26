<template>
  <!-- Order view -->
  
    <v-layout>
      <!-- <base-side-bar title="Cashier">
        <template v-slot:menu>
          <v-list-item
            prepend-icon="mdi-food"
            title="Order"
            name="Order"
            value="orders"
            class="text-orange-darken-4"
            style="text-decoration: none"
            to="/cashier"
          >
          </v-list-item>
        </template>
      </base-side-bar> -->
      <base-side-bar :menus="menus"></base-side-bar>
      <!-- Header -->
      <header-component title="Manage order">
        <v-text-field
          v-model="keyword"
          @keyup.enter="search"
          class="search text-white rounded-lg"
          density="compact"
          variant="solo-none"
          label="Search for order..."
          append-inner-icon="mdi-magnify"
          single-line
          hide-details
          @click:append-inner="console.log('search')"
        ></v-text-field>
      </header-component>
      <!------>
      
      <v-main style="height: auto">
        <v-slide-group class="ma-2">
          <v-slide-group-item >
            <v-btn class="mr-2 bg-grey-darken-2 rounded-lg text-none">Don't</v-btn>
            <v-btn class="bg-grey-darken-2 rounded-lg text-none">Done</v-btn>
          </v-slide-group-item>
        </v-slide-group>
        <!-- If no order -->
        <div class="h-screen" v-if="notPaidOrders.length == 0">
          <h4 class="text-center mt-5 text-orange-darken-4">
            Don't have any order.
          </h4>
        </div>
        <!-- If have some orders -->
        <order-list-table v-else :orders="notPaidOrders" />
        <!-- Product Summary -->
        <summary-component class="mt-2" title="Order Summary">
          <template v-slot:content>
            <div class="bg-grey-darken-2 mt-4 py-3 rounded-lg d-flex justify-space-between align-center">
              <span class="ml-2">Total</span>
              <span class="mr-2">{{ notPaidOrders.length }} items</span>
            </div>
          </template>
        </summary-component>
      </v-main>
    </v-layout>

</template>

<script setup>
import { useOrderStore } from "@/stores/order";
import { storeToRefs } from "pinia";
import { onMounted } from "vue";
import { ref } from "vue";
import { defineProps } from 'vue';


// Variable
defineProps(['title']);
const { getOrder, searchOrders} = useOrderStore();
const { notPaidOrders } = storeToRefs(useOrderStore());
const keyword = ref("");
const menus = ref([
  {
    link: "/cashier",
    title: "Order",
    icon: "mdi-home-analytics",
  },
]);

// Methods
const search = ()=> {
  searchOrders(keyword.value);}

// setInterval(() => {
//   getOrder();
// }, 6000);

// Lifecycle hook
onMounted(() => {
  getOrder();
});
</script>

<style scoped>
.search {
  background: #2c2c2c;
}
</style>
