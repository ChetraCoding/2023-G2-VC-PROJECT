import { defineStore } from "pinia";
import http from "../http-common";

const initialProduct = {
  name: null,
  barcode: null,
  category_id: null,
  description: null,
  is_active: false,
  image: null,
  product_customizes: []
};
export const useProductStore = defineStore("product", {
  state: () => {
    return {
      productInForm: { ...initialProduct },
      dialog: false,
      success: false,
      updateSuccess: false,
      err_barcode: '',
      products: []
    };
  },
  actions: {
    resetProductForm() {
      initialProduct.product_customizes = [];
      this.productInForm = { ...initialProduct };
    },
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
    },
    async updateProduct(product) {
      try {
        const res = await http.put(`products/${product.product_id}`, product);
        if (res.data.success) {
          this.updateSuccess = true;
        }
      } catch (err) {
        return err;
      }
    }
  },
});