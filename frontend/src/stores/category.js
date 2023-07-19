import { defineStore } from "pinia";
import http from "../http-common";

export const useCategoryStore = defineStore("category", {
  state: () => {
    return {
      error: null,
      success: false,
      categories: [],
    };
  },
  actions: {
    async getCategory() {
      try {
        const res = await http.get("categories");
        if (res.data.success) {
          this.categories = res.data.data;
        }
      } catch (err) {
        return err;
      }
    },
    async storeCategory(category) {
      try {
        const res = await http.post("categories", category);
        if (res.data.success) {
          this.success = true;
        }
      } catch (err) {
        this.error = err.response.data.message;
      }
    },
  },
});
