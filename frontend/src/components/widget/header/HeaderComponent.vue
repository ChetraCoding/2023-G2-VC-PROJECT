<template>
  <v-app-bar class="px-3 rounded-xl mt-1">
    <div class="w-50">
      <span class="text-orange-darken-4 font-weight-bold">{{ props.title }}</span>
    </div>
    <v-container fluid>
      <v-row class="d-flex justify-end">
        <v-menu min-width="200px" rounded>
          <template v-slot:activator="{ props }">
            <v-btn icon v-bind="props">
              <v-avatar color="orange-darken-4" size="large">
                <v-img v-if="user.image" :src="user.image" :alt="user.first_name"></v-img>
                <span v-else class="text-h5">{{ initials }}</span>
              </v-avatar>
            </v-btn>
          </template>
          <v-card class="rounded-xl mt-3 px-5 py-2">
            <v-card-text>
              <div class="mx-auto text-center">
                <v-avatar color="orange-darken-4">
                  <v-img v-if="user.image" :src="user.image" :alt="user.first_name"></v-img>
                  <span v-else class="text-h5">{{ initials }}</span>
                </v-avatar>
                <h3>{{ user.first_name }} {{ user.last_name }}</h3>
                <p class="text-subtitle-1 mt-1">
                  {{ user.email }}
                </p>
                <v-divider class="my-3"></v-divider>
                <div class="d-flex justify-center">
                  <danger-button @click="isLogout = true">Log out</danger-button>
                </div>
              </div>
            </v-card-text>
          </v-card>
        </v-menu>
      </v-row>
    </v-container>
  </v-app-bar>

  <base-dialog v-model="isLogout" title="Log out" ms="Are you sure you want to log out?">
    <v-card-actions class="justify-space-between">
      <danger-button @click="isLogout = false">Cancel</danger-button>
      <primary-button @click="logout">Confirm</primary-button>
    </v-card-actions>
  </base-dialog>
</template>

<script setup>
import { defineProps, ref } from "vue";
import { useUserStore } from "@/stores/user";
import { storeToRefs } from "pinia";
import { useCookieStore } from "@/stores/cookie";
import { useRouter } from "vue-router";

// Variables
const props = defineProps(["title"]);
const { removeCookie } = useCookieStore();
const { user } = storeToRefs(useUserStore());
const initials = user.value.first_name.slice(0, 1).toUpperCase() + user.value.last_name.slice(0, 1).toUpperCase();
const isLogout = ref(false);
const router = useRouter();

// Method
const logout = () => {
  isLogout.value = false;
  removeCookie('user_token');
  router.push('/login');
}
</script>