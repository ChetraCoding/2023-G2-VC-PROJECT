<template>
  <div class="h-75 mt-5 text-white w-100 d-flex justify-center">
    <div class="login-form bg-grey-lighten-1 rounded-lg">
      <v-form @submit.prevent="onSubmit" class="form w-100 px-8 py-10">
        <div class="d-flex flex-column align-center">
          <v-icon
            icon="mdi-shield-account-outline"
            class="logo text-red-accent-2"
          ></v-icon>
          <h1>Change Password</h1>
        </div>
        <div class="mt-4">
          <v-text-field
            class="text-black"
            v-model="credentials.password"
            :append-inner-icon="showPassword ? 'mdi-eye-off' : 'mdi-eye'"
            :type="showPassword ? 'text' : 'password'"
            density="compact"
            placeholder="Old password"
            prepend-inner-icon="mdi-lock-outline"
            variant="outlined"
            @click:append-inner="showPassword = !showPassword"
            :error-messages="v$.password.$errors.map((e) => e.$message)"
            @input="v$.password.$touch"
            @blur="v$.password.$touch"
          ></v-text-field>

          <v-text-field
            class="text-black"
            v-model="credentials.password"
            :append-inner-icon="showPassword ? 'mdi-eye-off' : 'mdi-eye'"
            :type="showPassword ? 'text' : 'password'"
            density="compact"
            placeholder="New password"
            prepend-inner-icon="mdi-lock-outline"
            variant="outlined"
            @click:append-inner="showPassword = !showPassword"
            :error-messages="v$.password.$errors.map((e) => e.$message)"
            @input="v$.password.$touch"
            @blur="v$.password.$touch"
          ></v-text-field>
          <v-text-field
            class="text-black"
            v-model="credentials.password"
            :append-inner-icon="showPassword ? 'mdi-eye-off' : 'mdi-eye'"
            :type="showPassword ? 'text' : 'password'"
            density="compact"
            placeholder="Comfirm password"
            prepend-inner-icon="mdi-lock-outline"
            variant="outlined"
            @click:append-inner="showPassword = !showPassword"
            :error-messages="v$.password.$errors.map((e) => e.$message)"
            @input="v$.password.$touch"
            @blur="v$.password.$touch"
          ></v-text-field>
        </div>
        <primary-button
          @click="v$.$touch()"
          class="mt-2"
          block
          size="large"
          type="medium"
        >
          CHANGE
        </primary-button>
      </v-form>
    </div>
  </div>
</template>

<script setup>
import http from "../http-common";
import { useCookieStore } from "@/stores/cookie";
import { useRouter } from "vue-router";
import { reactive } from "vue";
import useVuelidate from "@vuelidate/core";
import { required, email } from "@vuelidate/validators";
import { ref } from "vue";

// Variable
const cookieStore = useCookieStore();
const router = useRouter();
const showPassword = ref(false);
const errMessage = ref("");
const initialsUser = {
  email: "",
  password: "",
};
const credentials = reactive({
  ...initialsUser,
});
const rules = {
  email: { required, email },
  password: { required },
};
const v$ = useVuelidate(rules, credentials);

const onSubmit = async () => {
  if (v$.value.$errors.length === 0) {
    try {
      const res = await http.post("login", credentials);
      cookieStore.setCookie("user_token", res.data.token, 30);
      cookieStore.setCookie("user_role", res.data.user.role, 30);
      cookieStore.setCookie("user", JSON.stringify(res.data.user), 30);
      if (res.data.user.role === "restaurant_owner") {
        router.push("/");
      } else {
        router.push(`/${res.data.user.role}`);
      }
    } catch (err) {
      if (err.response.data.message) {
        errMessage.value = err.response.data.message;
      }
    }
  }
};
</script>

<style scoped>
.login-form {
  width: 50%;
}

.logo {
  font-size: 10rem;
}

.cursor {
  cursor: pointer;
}

@media screen and (max-width: 900px) {
  .login-form {
    width: 100%;
  }

  .form {
    width: 60% !important;
  }
}

@media screen and (max-width: 430px) {
  .form {
    width: 100% !important;
  }
}
</style>
