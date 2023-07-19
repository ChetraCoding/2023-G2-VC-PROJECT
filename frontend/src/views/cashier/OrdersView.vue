<template>
  <!-- Order view -->
  <v-card>
    <v-layout>
      <base-side-bar title="Cashier">
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
      </base-side-bar>

      <header-component title="Manage order" />

      <v-main style="height: auto">
        <v-card class="pa-3 mt-3 d-flex justify-space-between">
          <!-- <v-spacer></v-spacer>
          <v-text-field
            density="compact"
            variant="outlined"
            placeholder="Search orders"
            append-inner-icon="mdi-magnify"
          ></v-text-field> -->
        </v-card>
        <!-- If no order -->
        <div class="h-screen" v-if="notPaidOrders.length == 0">
          <h4 class="text-center mt-5 text-orange-darken-4">
            Don't have any order.
          </h4>
        </div>
        <!-- If have some orders -->
        <order-list-table v-else :orders="notPaidOrders" />
      </v-main>
    </v-layout>
  </v-card>
</template>

<script setup>
import {useOrderStore} from "@/stores/order";
import { storeToRefs } from "pinia";
import { onMounted } from "vue";

// Variable
const {getOrder} = useOrderStore();
const {notPaidOrders} = storeToRefs(useOrderStore()); 

// Lifecycle hook
onMounted(()=>{
  getOrder();
})

</script>
