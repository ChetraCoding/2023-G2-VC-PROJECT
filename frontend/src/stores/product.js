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
      try {
        const res = await http.get('products');
        if (res.data.success) {
          this.products = res.data.data;
        }
      } catch (err) {
        return err;
      }
    },
    async storeProduct(product) {
      try {
        const res = await http.post('products', product);
        if (res.data.success) {
          console.log(res.data);
          this.getProducts();
        }
      } catch (err) {
        console.log(err);
      }
    }
  },
});