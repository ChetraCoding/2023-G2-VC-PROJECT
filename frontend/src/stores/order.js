import { defineStore } from "pinia";
import http from "../http-common";

export const useOrderStore = defineStore("order", {
    state: () => {
        return {
            orders: []
        };
    },
    actions: {
        async storeOrder(order) {
            try {
                const res = await http.post('orders', order);
                if (res.data.success) return res.data.data;
            } catch (err) {
                return err;
            }
        }
    },
});