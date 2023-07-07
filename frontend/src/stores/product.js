import { defineStore } from "pinia";
import http from "../http-common";

export const useProductStore = defineStore("product", {
  state: () => {
    return {
        products: []
    };
  },
  actions: {
    async getProducts() {
        const res = await http.get('products');
        if (res.data.success) {
            this.products = res.data.data;
        }
    }
  },
});