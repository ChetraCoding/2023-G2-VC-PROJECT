// Reference from: https://seb-l.github.io/pinia-plugin-persist/advanced/custom-storage.html

import { defineStore } from "pinia";
import Cookies from "js-cookie";

export const useCookieStore = defineStore("cookie", {
  state: () => ({
    user: JSON.parse(Cookies.get('user_info'))
  }),
  actions: {
    setCookie(key, value, day) {
      Cookies.set(key, value, { expires: day });
    },

    getCookie(key) {
      return Cookies.get(key);
    },

    removeCookie(key) {
      Cookies.remove(key);
    },
  },
});
