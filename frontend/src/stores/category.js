import { defineStore } from "pinia";
import http from "../http-common";

export const useCategoryStore = defineStore("category", {
  state: () => {
    return {
        categories: []
    };
  },
  actions: {
    async getCategories() {
        const res = await http.get('listCategory');
        if (res.data.success) {
            this.categories = res.data.data;
        }
    },
    async createCategory(category) {
        const res = await http.post('listCategory');
        if (res.data.success) {
            this.isloading = false;
            this.categories = res.data.data
            this.categories.name = "";
        } else {
            alert(res.data.message)
        }
    }

  },
});
