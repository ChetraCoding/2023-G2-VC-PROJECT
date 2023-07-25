import { defineStore } from "pinia";
import http from "../http-common";
import { useCookieStore } from "@/stores/cookie";
const initialsStaff = {
  first_name: "",
  last_name: "",
  gender: null,
  email: null,
  password: null,
  role_id: null,
};
export const useUserStore = defineStore("user", {
  state: () => {
    return {
      staffInForm : { ... initialsStaff },
      createSuccess: false,
      updateSuccess: false,
      errMessage: '',
      user: null,
      staff: [],
      deleteSuccess: false,
    };
  },
  actions: {
    clearForm() {
      this.staffInForm = { ... initialsStaff };
    },
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

    // Create staff
    async addStaff(staff) {
      try {
        const res = await http.post("staff", staff);
        if (res.data.success) {
          this.createSuccess = true;
          this.errMessage = '';
          this.getStaff();
        }
      } catch (err) {
        if (err.response.data.message.email) {
          this.errMessage = 'The email has already been taken.';
        }
      }
    },
    // Update staff
    async updateStaff(staff) {
      try {
        const res = await http.put(`staff/${staff.user_id}`, staff);
        if (res.data.success) {
          this.updateSuccess = true;
          this.errMessage = '';
          this.getStaff();
        }
      } catch (err) {
        console.log(err);
        if (err.response.data.message.email) {
          this.errMessage = 'The email has already been taken.';
        }
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
