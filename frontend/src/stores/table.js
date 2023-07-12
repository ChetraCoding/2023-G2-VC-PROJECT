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
    async getTables() {
      try {
        const res = await http.get("tables");
        if (res.data.success) {
          this.tables = res.data.data;
        }
      } catch (err) { return err }
    },
    async storeTable(table) {
      try {
          const res = await http.post('tables', table);
          if (res.data.success){
            this.success = true;
          }
      } catch (err) {
        this.error = err.response.data.message.table;
      }
  }
  },
});
