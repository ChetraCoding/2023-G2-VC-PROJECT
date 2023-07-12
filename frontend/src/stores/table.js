import { defineStore } from "pinia";
import http from "../http-common";

export const useTableStore = defineStore("table", {
  state: () => {
    return {
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
    }
  },
});
