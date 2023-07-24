// Reference From : https://vuetifyjs.com/en/components/tables/

<template>
  <!-- Alert message -->
  <base-alert v-model="paidSuccess">
    <v-icon class="mr-2 text-h4 mdi mdi-check-circle"></v-icon>
    <h6 class="mt-2">Order have paid successfully!</h6>
  </base-alert>

  <!-- Dialog remove customize -->
  <base-dialog
    v-model="isComplete"
    title="Tips"
    ms="Are you sure you want to completed?"
  >
    <danger-button 
    @click="isComplete = false"
    >
    <v-icon icon="mdi-close-box-multiple"></v-icon>
    Cancel
    </danger-button>
    <primary-button 
    @click="complete()"
    >
    <v-icon icon="mdi-check-circle-outline"></v-icon>
    Confirm
  </primary-button>
  </base-dialog>

  <!-- Create table of list orders -->
  <v-card
    v-for="(order, index) in props.orders"
    :key="order.name"
    class="d-flex pa-2 ma-2 bg-grey-darken-2 rounded-lg"
  >
    <v-card-text class="d-flex justify-space-between ">
      <span>ID : {{ index + 1 }}</span>
      <span>Table : {{ order.table_number }}</span>
      <span>{{ new Date(order.datetime).toDateString() }}</span>
      <span>{{ new Date(order.datetime).toLocaleTimeString() }}</span>
      <span v-if="order">${{ getTotalPrice(order) }}</span>
    </v-card-text>
    <v-card-actions>
      <dark-button 
        @click="(orderInfo = order), (dialog = true)">
        <v-icon 
          icon="mdi-eye" 
          color="red-accent-2" 
        > 
        </v-icon>
        View
      </dark-button>

      <dark-button 
        @click="(orderInfo = order), (dialog = true)">
        <v-icon 
          icon="mdi-printer" 
          color="red-accent-2" 
        > 
        </v-icon>
        Print
      </dark-button>

      <dark-button
        @click="
          isComplete = true;
          orderClicked = order;
        "
        ><v-icon
          icon="mdi-checkbox-marked-circle"
          color="red-accent-2"
        >
        </v-icon>
        Check
        </dark-button
      >
    </v-card-actions>
  </v-card>

  <!-- Dialog of confirm order -->
  <v-dialog v-model="dialog" persistent width="600">
    <v-card class="rounded-lg">
      <v-card-title class="bg-red-accent-2 text-center"
        >Confirm Orders</v-card-title
      >
      <v-card-text>
        <div class="d-flex text-darken-4">
          <h6>Table:</h6>
          <h6 class="ml-2 font-weight-bold">{{ orderInfo.table_number }}</h6>
        </div>
        <div class="d-flex text-darken-4">
          <h6>Date:</h6>
          <h6 class="ml-2 font-weight-bold">
            {{ new Date(orderInfo.datetime).toDateString() }}
          </h6>
        </div>
        <div class="d-flex text-darken-4">
          <h6>Time:</h6>
          <h6 class="ml-2 font-weight-bold">
            {{ new Date(orderInfo.datetime).toLocaleTimeString() }}
          </h6>
        </div>

        <!-- Card of list -->
        <h6 class="text-darken-4 font-weight-bold mt-3">Summary Orders</h6>
        <v-list>
          <div
            v-for="order_detail in orderInfo.order_details"
            :key="order_detail.id"
          >
            <div>
              <span>{{ order_detail.product_customize.product.name }}</span
              ><br />
              <span>size / {{ order_detail.product_customize.size }}</span>
            </div>
            <div class="d-flex">
              <span>X{{ order_detail.quantity }}</span>
              <v-spacer></v-spacer>
              <span
                >${{
                  order_detail.quantity * order_detail.product_customize.price
                }}</span
              >
            </div>
            <hr />
          </div>
        </v-list>

        <div class="d-flex">
          <h6 class="text-darken-4 font-weight-bold">Total:</h6>
          <v-spacer></v-spacer>
          <h6 v-if="orderInfo" class="font-weight-bold text-darken-4">
            ${{ getTotalPrice(orderInfo) }}
          </h6>
        </div>
      </v-card-text>
      <v-card-actions class="bg-grey-lighten-2">
        <v-spacer></v-spacer>
        <danger-button @click="dialog = false">
          <v-icon icon="mdi-close-box-multiple"></v-icon>
          Close
        </danger-button>
      </v-card-actions> 
    </v-card>
  </v-dialog>
</template>

<script setup>
import { useOrderStore } from "@/stores/order";
import { storeToRefs } from "pinia";
import { ref, defineProps } from "vue";

// Variables
const props = defineProps(["orders"]);
const dialog = ref(false);
const orderInfo = ref(null);
const isComplete = ref(false);
const orderClicked = ref(null);
const { updateOrdersToPaid } = useOrderStore();
const { paidSuccess } = storeToRefs(useOrderStore());

// Method
const getTotalPrice = (order) => {
  const sum = ref(0);
  for (let order_detail of order.order_details) {
    sum.value += order_detail.product_customize.price * order_detail.quantity;
  }
  return sum.value;
};
const complete = () => {
  const updatePaidOrde = {
    is_completed: orderClicked.value.is_completed,
    is_paid: true,
  };
  updateOrdersToPaid(orderClicked.value.order_id, updatePaidOrde);
  isComplete.value = false;
  orderClicked.value = null;
};

</script>
