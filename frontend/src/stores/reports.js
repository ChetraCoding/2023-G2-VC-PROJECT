import { defineStore } from "pinia";
import http from "../http-common";

export const useReportsStore = defineStore("reports", {
  state: () => {
    return {
      productReports: [],
    };
  },
  actions: {
    async getProductReports(month, year) {
      try {
        const res = await http.get(`product_report/${month}/${year}`);
        if (res.data.success) {
          this.productReports = res.data.data;
        }
      } catch (err) {
        console.log(err);
      }
    },
  },
});
