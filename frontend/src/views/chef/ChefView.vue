<template>
  <v-layout>
    <!-- Sidebar -->
    <base-side-bar title="Chef">
      <template v-slot:menu>
        <v-list-item
          prepend-icon="mdi-food"
          title="Order"
          value="order"
          class="text-orange-darken-4"
          to="/chef"
          style="text-decoration: none"
        >
        </v-list-item>
      </template>
    </base-side-bar>

    <header-component title="Manage order" />
    <v-main style="height: auto" class="bg-gray-lighten-3 mt-3">
      <!-- Alert message -->
      <base-alert v-model="success">
        <v-icon class="mr-2 text-h4 mdi mdi-check-circle"></v-icon>
        <h6 class="mt-2">Completed order successfully!</h6>
      </base-alert>
      <!-- No order -->
      <div class="d-flex flex-wrap justify-content-center gap-3">
        <div class="h-screen" v-if="orders.length == 0">
          <h4 class="text-center mt-5 text-orange-darken-4">
            Don't have any order.
          </h4>
        </div>
        <!-- Order card -->
        <chef-order-card v-else :listOrder="orders" @complete="doneOfOrder">
        </chef-order-card>
      </div>
    </v-main>
  </v-layout>
</template>

<script setup>
import { onMounted } from "vue";
import { useOrderStore } from "@/stores/order";
import { storeToRefs } from "pinia";

// Variables
const { getOrdersNotCompleted, updateOrdersToCompleted } = useOrderStore();
const { orders, success } = storeToRefs(useOrderStore());

// Methods
const doneOfOrder = (index) => {
  const order = orders.value[index];
  const orderId = order["order_id"];
  const updateCompleteOrder = {
    is_completed: true,
    is_paid: order["is_paid"],
  };
  updateOrdersToCompleted(orderId, updateCompleteOrder);
};

// Lifecycle hook
onMounted(() => {
  getOrdersNotCompleted();
});
</script>