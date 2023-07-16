<template>
  <!-- list card of orders -->
  <div v-for="(order, index) in propsOrder.listOrder" :key="index">
    <v-card v-if="order.is_completed === 0" class="rounded-lg" width="230px">
      <v-card-title
        class="d-flex justify-content-center bg-orange-darken-4 p-2"
      >
        <v-card-subtitle
          style="font-size: 13px; display: flex  align-items: center"
          ><v-icon class="mdi mdi-table" style="font-size: 16px"></v-icon> :
          {{ order.table_number }}
        </v-card-subtitle>
        <v-card-subtitle
          style="font-size: 13px display: flex; align-items: center"
          ><v-icon
            class="mdi mdi-clock-outline"
            style="font-size: 16px"
          ></v-icon>
          <!-- To access only time -->
          : {{ new Date(order.datetime).toLocaleTimeString() }}</v-card-subtitle
        >
      </v-card-title>
      <div class="p-2 text-warning">
        <div class="d-flex flex-column gap-2">
          <!-- list foods in order -->
          <div
            class="bg-grey-lighten-3 rounded p-1"
            v-for="order_detail in order.order_details"
            :key="order_detail"
          >
            <v-sub-title style="font-size: 14px"
              >Name :
              {{ order_detail.product_customize.product.name }}</v-sub-title
            ><br />
            <v-sub-title style="font-size: 14px"
              >Size: {{ order_detail.product_customize.size }}</v-sub-title
            ><br />
            <v-sub-title style="font-size: 14px"
              >x {{ order_detail.quantity }}</v-sub-title
            ><br />
          </div>
        </div>
      </div>
      <v-card-actions class="d-flex justify-content-center">
        <primary-button @click="complete(index)"> Complete </primary-button>
      </v-card-actions>
    </v-card>
  </div>
  <!-- ---------- -->
</template>
<script setup>
import { defineProps, defineEmits } from "vue";

const propsOrder = defineProps(["listOrder"]);
const emitComplete = defineEmits(["complete"]);

// Methods
const complete = (index) => {
  emitComplete("complete", index);
};
</script>