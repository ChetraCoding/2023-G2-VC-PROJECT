<template>
  <v-app-bar class="pl-1 mx-2 pr-2 bg-grey-darken-2 nav">
    <div class="w-100 px-3 py-2 bg-grey-darken-2 rounded-lg  d-flex align-center justify-space-between">
      <span class="text-white">{{ props.title }}</span>
      <div class="w-50">
        <slot></slot>
      </div>

      <v-menu rounded>
        <template v-slot:activator="{ props }">
          <v-btn icon v-bind="props">
            <v-avatar color="red-accent-2" size="large">
              <v-img v-if="user.image" :src="user.image" :alt="user.first_name"></v-img>
              <span v-else class="text-h5">{{ initials }}</span>
            </v-avatar>
          </v-btn>
        </template>
        <v-card class="bg-grey-darken-2 rounded-lg mt-3 px-5 py-2">
          <v-card-text>
            <div class="mx-auto text-center">
              <v-avatar color="red-accent-2" size="72">
                <v-img v-if="user.image" :src="user.image" :alt="user.first_name"></v-img>
                <span v-else class="text-h4">{{ initials }}</span>
              </v-avatar>
              <h3>{{ user.first_name }} {{ user.last_name }}</h3>
              <p class="font-inter text-subtitle-1 mt-1">
                {{ user.email }}
              </p>
              <v-divider class="my-3"></v-divider>
              <div class="d-flex justify-center">
                <danger-button @click="isLogout = true">
                  <v-icon icon="mdi-logout" color="white" size="large"></v-icon>
                  Log out
                </danger-button>
              </div>
            </div>
          </v-card-text>
        </v-card>
      </v-menu>
    </div>
  </v-app-bar>

  <base-dialog v-model="isLogout" title="Log out" ms="Are you sure you want to log out?">
    <danger-button @click="isLogout = false">
      <v-icon icon="mdi-close-box-multiple" color="white" size="large"></v-icon>
      Cancel
    </danger-button>
    <primary-button @click="logout">
      <v-icon icon="mdi-checkbox-multiple-marked" color="white" size="large"></v-icon>
      Confirm
    </primary-button>
  </base-dialog>
</template>

<script setup>
import http from "@/http-common";
import { defineProps, ref } from "vue";
import { useCookieStore } from "@/stores/cookie";
import { useRouter } from "vue-router";

// Variables
const props = defineProps(["title"]);
const { getCookie, removeCookie } = useCookieStore();
const user = ref(JSON.parse(getCookie('user')));
const initials = user.value.first_name.slice(0, 1).toUpperCase() + user.value.last_name.slice(0, 1).toUpperCase();
const isLogout = ref(false);
const router = useRouter();

// Method
const logout = async () => {
  try {
    await http.post('logout');
    isLogout.value = false;
    removeCookie('user_token');
    removeCookie('user_role');
    removeCookie('user');
    router.push('/login');
  } catch (err) {
    console.log(err);
  }
}

</script>

<style scoped>
.nav {
  border-radius: 10px 20px 20px 10px !important;
}

.font-inter {
  font-family: 'Inter', sans-serif !important;
}
</style>