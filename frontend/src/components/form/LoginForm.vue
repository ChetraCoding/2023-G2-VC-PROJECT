<template>
  <v-card width="500" class="rounded-lg px-8 py-6 login-form">
    <v-form @submit.prevent="onSubmit" class="pb-3">
      <div class="d-flex justify-center pb-4">
        <img class="w-50" :src="require('../../assets/login-logo.png')" alt="login" />
      </div>
      <div>
        <v-text-field v-model="email" @keyup="errors.email = ''" class="mb-2" label="Email"
          placeholder="example@gmail.com" type="email" hide-details="auto">
        </v-text-field>
        <span class="text-caption text-red">{{ errors.email }}</span>
      </div>

      <div>
        <v-text-field v-model="password" @keyup="errors.password = ''" label="Password" placeholder="**********"
          :append-inner-icon="showPassword ? 'mdi-eye-off' : 'mdi-eye'" :type="showPassword ? 'text' : 'password'"
          @click:append-inner="showPassword = !showPassword" hide-details="auto">
        </v-text-field>
        <span class="text-caption text-red">{{ errors.password }}</span>
      </div>

      <br />

      <v-btn class="rounded-pill font-width-bold" color="orange-darken-4" size="large" type="medium" block>
        LOGIN
      </v-btn>
    </v-form>
  </v-card>
</template>

<script setup>
import { ref, defineEmits, defineProps, computed } from "vue";
let email = ref("");
let password = ref("");
const showPassword = ref(false);
const emit = defineEmits(["login"]);
const props = defineProps(["errors"]);

const errors = computed(() => {
  return props.errors;
});

const onSubmit = () => {
  emit("login", { email: email.value, password: password.value });
};
</script>

<style scoped>
.login-form {
  width: 35%;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px,
    rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px,
    rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}
</style>
