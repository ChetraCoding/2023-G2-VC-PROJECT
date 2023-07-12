import { defineStore } from "pinia";
import http from "../http-common";
import { useCookieStore } from "@/stores/cookie";

export const useUserStore = defineStore("user", {
  state: () => {
    return {
      user: null,
    };
  },
  actions: {
    async getUser() {
      const { getCookie } = useCookieStore();
      try {
        if (getCookie('user_token')) {
          const res = await http.get("user");
          if (res.data.success) {
            this.user = res.data.data;
          }
        }
      } catch (err) {
        this.user = null;
      }
    },
  },
});
