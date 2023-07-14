// Reference From : https://vuetifyjs.com/en/components/tables/

<template>
  <!-- Alert message -->
  <base-alert v-model="paidSuccess">
        <v-icon class="mr-2 text-h4 mdi mdi-check-circle"></v-icon>
        <h6 class="mt-2">Order have paid successfully!</h6>
      </base-alert>
  <!-- Create table of list orders -->
  <v-table>
    <thead>
      <tr>
        <th class="bg-white text-left text-black font-weight-bold">No.</th>
        <th class="bg-white text-left text-black font-weight-bold">
          Table Number
        </th>
        <th class="bg-white text-left text-black font-weight-bold">Date</th>
        <th class="bg-white text-left text-black font-weight-bold">Time</th>
        <th class="bg-white text-left text-black font-weight-bold">Price</th>
        <th class="bg-white text-left text-black font-weight-bold">Action</th>
      </tr>
    </thead>

    <tbody>
      <tr v-for="(order, index) in props.orders" :key="order.name">
        <td>{{ index + 1 }}</td>
        <td>{{ order.table_number }}</td>
        <td>{{ new Date(order.datetime).toDateString() }}</td>
        <td>{{ new Date(order.datetime).toLocaleTimeString() }}</td>
        <td>${{ getTotalPrice(order) }}</td>

        <td>
          <v-icon
            icon="mdi-eye"
            color="red"
            class="mr-3"
            @click="(orderInfo = order), (dialog = true)"
          ></v-icon>

          <!-- Icon print and check-->
          <v-icon icon="mdi-printer"></v-icon>
          <v-icon
            icon="mdi-checkbox-marked-circle"
            class="ml-3"
            color="orange-darken-4"
            @click="complete(index)"
          ></v-icon>
        </td>
      </tr>
    </tbody>
  </v-table>

  <!-- Dialog of confirm order -->
  <v-dialog v-model="dialog" width="600">
    <v-card class="rounded-xl">
      <v-card-title class="bg-orange-darken-4 text-center"
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
            v-list-item
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
          <h6 class="font-weight-bold text-darken-4">
            ${{ getTotalPrice(orderInfo) }}
          </h6>
        </div>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <danger-button @click="dialog = false">Close</danger-button>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script setup>
import {useOrderStore} from '@/stores/order';
import { storeToRefs } from 'pinia';
import { ref, defineProps, onMounted } from "vue";

// Variables
const props = defineProps(["orders"]);
const dialog = ref(false);
const orderInfo = ref(null);
const {getOrder,updateOrdersToPaid} = useOrderStore();
const { paidSuccess } = storeToRefs(useOrderStore());

// Method
const getTotalPrice = (order) => {
  const sum = ref(0);
  for (let order_detail of order.order_details) {
    sum.value += order_detail.product_customize.price * order_detail.quantity;
  }
  return sum.value;
};

const complete = (index) => {
  const order = props.orders[index];
  const orderId = order["order_id"];
  const updatePaidOrde = {
    is_completed: order["is_completed"],
    is_paid: true,
  };
  updateOrdersToPaid(orderId, updatePaidOrde);
}
// Lifecycle hook
onMounted(()=>{
  getOrder();
})
</script>
