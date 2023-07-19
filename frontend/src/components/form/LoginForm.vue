<template>
  <div class="form text-white d-flex h-100">
    <div class="login">
      <div>
        <img
          class="w-100 h-80 fastfood low-light-image"
          :src="require('../../assets/pic-fast-food.png')"
          alt="fastfood"
        />
      </div>
    </div>
    <v-form @submit.prevent="onSubmit" class="px-8 py-10 login-form">
      <div class="d-flex justify-center">
        <img
          class="w-60"
          :src="require('../../assets/login-logo.png')"
          alt="login"
        />
      </div>
      <br /><br />
      <div>
        <v-text-field
          v-model="email"
          @keyup="errors.email = ''"
          class="mb-2"
          label="Email"
          placeholder="example@gmail.com"
          type="email"
          clearable
        >
        </v-text-field>
        <span class="text-caption text-red error">{{ errors.email }}</span>
      </div>

      <div>
        <v-text-field
          v-model="password"
          @keyup="errors.password = ''"
          label="Password"
          placeholder="**********"
          type="password"
          clearable
        >
        </v-text-field>
        <span class="text-caption text-red error">{{ errors.password }}</span>
      </div>
      <div>
        <v-tex-filed class="d-flex justify-end">
          <span class="text-info">Forgot Password ?</span>
        </v-tex-filed>
      </div>
      <br />
      <v-btn
        class="rounded-pill font-width-bold"
        color="orange-darken-4"
        size="large"
        type="medium"
        block
      >
        <v-icon> icon="mdi-login-variant" </v-icon>
        LOGIN
      </v-btn>
    </v-form>
  </div>
</template>

<script setup>
import { ref, defineEmits, defineProps, computed } from "vue";
let email = ref("");
let password = ref("");
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
.form {
  background: #2c2c2c;
}
.login-form {
  width: 35%;
}
.login,
.fastfood,
img {
  width: 66.6%;
  margin-left: -30px;
}
.low-light-image {
  filter: brightness(55%);
}
</style>
