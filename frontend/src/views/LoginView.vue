<template>
  <main class="h-screen d-flex justify-center align-center">
    <login-form @login="login" :errors="errors"></login-form>
  </main>
</template>
<script setup>
import http from "../http-common";
import { useCookieStore } from "@/stores/cookie";
import { useRouter } from "vue-router";
import { ref } from "vue";

const cookieStore = useCookieStore();
const router = useRouter();

let errors = ref({ email: null, password: null });

const login = async (credentials) => {
  errors.value.email = requiredEmail(credentials.email);
  errors.value.password = requiredPassword(credentials.password);
  if (errors.value.email == null && errors.value.password == null) {
    try {
      const res = await http.post("login", credentials);
      cookieStore.setCookie("user_token", res.data.token, 30);
      cookieStore.getCookie("user_token");
      if (res.data.user.role === "restaurant_owner") {
        router.push("/category");
      } else {
        router.push(`/${res.data.user.role}`);
      }
    } catch (err) {
      errors.value.password = "Incorrect your passwod.";
    }
  }
};

const requiredEmail = (email) => {
  if (!email) {
    return "Email is required.";
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    return "Please enter a valid email address.";
  } else {
    return null;
  }
};

const requiredPassword = (passwod) => {
  if (!passwod) {
    return "Password is required.";
  }
  return null;
};
</script>
