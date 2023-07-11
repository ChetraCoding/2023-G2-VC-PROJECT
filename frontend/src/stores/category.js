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
    async getData() {
      const res = await http.get("categories");
      if (res.data.success) {
        this.categories = res.data.data;
      }
    },
    async storeData(category) {
      try {
        await http.post("categories", category);
        this.error = null;
        this.success = true;
        this.getData();
      } catch (err) {
        this.error = err.response.data.message;
      }
    },
  },
});
