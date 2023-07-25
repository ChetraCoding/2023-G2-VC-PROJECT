import { defineStore } from "pinia";
import http from "../http-common";
import { useCookieStore } from "@/stores/cookie";

export const useUserStore = defineStore("user", {
  state: () => {
    return {
      success: false,
      err_email: '',
      user: null,
      staff: [],
      deleteSuccess: false,
    };
  },
  actions: {
    async getUser() {
      const { getCookie } = useCookieStore();
      try {
        if (getCookie("user_token")) {
          const res = await http.get("user");
          if (res.data.success) {
            this.user = res.data.data;
          }
        }
      } catch (err) {
        this.user = null;
      }
    },

    // Create staff
    async addStaff(staff) {
      try {
        const res = await http.post("create_account", staff);
        if (res.data.success) {
          this.err_email = '';
          this.getStaff();
        }
      } catch (err) {
        if (err.response.data.message.email) {
          this.err_email = 'The email has already been taken.';
        }
      }
    },

 

    // List staff
    async getStaff() {
      try {
        const res = await http.get("staff");
        if (res.data.success) {
          this.staff = res.data.data;
        }
      } catch (err) {
        return err;
      }
    },

       // Delete staff
       async deleteStaff(id) {
        try {
          const res = await http.delete(`staff/${id}`);
          if (res.data.success) {
            this.deleteSuccess = true;
            this.getStaff();
          }
        } catch (err) {
          return err;
        }
      },
  },
});
