import { defineStore } from "pinia";
import http from "../http-common";

export const useTableStore = defineStore("table", {
  state: () => {
    return {
      tables: []
    };
  },
  actions: {
    async getData() {
      const res = await http.get("tables");
      if (res.data.success) {
        this.tables = res.data.data;
      }
    }
  },
});
