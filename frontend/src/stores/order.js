import { defineStore } from "pinia";
import http from "../http-common";

export const useOrderStore = defineStore("order", {
  state: () => {
    return {
        orders: []
    };
  },
  actions: {
    async getData() {
        const res = await http.get('orders');
        if (res.data.success) {
            this.orders = res.data.data;
        }
    }
  },
});