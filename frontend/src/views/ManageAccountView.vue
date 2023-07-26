<template>
  <v-layout>
    <header-component title="Manage Account" />

    <v-main style="height: auto">
      <v-card class="card">
        <span class="mdi mdi-keyboard-backspace"></span>
        <div class="d-flex justify-content-evenly">
          <v-avatar color="red-accent-2" size="150" class="align-self-center">
            <v-img
              v-if="user.image"
              :src="user.image"
              :alt="user.first_name"
            ></v-img>
          </v-avatar>
          <div>
            <h4 class="font-weight-bold">About you</h4>
            <div>

              <h6>
                First Name :
                <span class="font-weight-bold">{{ user.first_name }}</span>
              </h6>
              <h6>
                Last Name :
                <span class="font-weight-bold">{{ user.last_name }}</span>
              </h6>
              <h6>
                Gender : <span class="font-weight-bold">{{ user.gender }}</span>
              </h6>
              <h6>
                Role : <span class="font-weight-bold">{{ user.role }}</span>
              </h6>
              <h6>
                Email : <span class="font-weight-bold">{{ user.email }}</span>
              </h6>
              <h6>
                Password : <span class="font-weight-bold" @click="$router.push('/change_password')">change password</span>
              </h6>
            </div>
          </div>
        </div>
      </v-card>
    </v-main>
  </v-layout>
</template>
<script setup>
import { ref } from "vue";
import { useCookieStore } from "@/stores/cookie";

// Variables
const { getCookie } = useCookieStore();
const user = ref(JSON.parse(getCookie("user")));

// // Method

// Lifecycle hook
// onMounted(() => {
//   console.log(user.value.first_name);
// });
</script>

<style scoped>
.card {
  margin: auto;
  background-color: #e3dbdb;
  border: 1px solid #c65959;
  padding: 10px;
  width: 50%;
}
</style>