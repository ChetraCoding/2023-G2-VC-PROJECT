import { defineStore } from "pinia";
import http from "../http-common";

export const useProductStore = defineStore("product", {
  state: () => {
    return {
      success: false,
      err_barcode: '',
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
          this.success = true;
          this.err_barcode = '';
          this.getProducts();
        }
      } catch (err) {
        if (err.response.data.message.barcode) {
          this.err_barcode = 'Barcode already exists.';
        }
      }
    }
  },
});