import { defineStore } from "pinia";
import http from "../http-common";

export const useTableStore = defineStore("table", {
  state: () => {
    return {
      error: null,
      success: false,
      tables: []
    };
  },
  actions: {
    async getData() {
      const res = await http.get("tables");
      if (res.data.success) {
        this.tables = res.data.data;
      }
    },
    async storeTable(table) {
      try {
        await http.post("tables", table);
        this.error = null;
        this.success = true;
        this.getData();
      } catch (err) {
        this.error = err.response.data.message;
      }
    },
  },
});
