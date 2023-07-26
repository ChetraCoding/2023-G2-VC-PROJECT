<template>
  <v-layout>
    <header-component title="Manage Account" />

    <v-main style="height: auto">
      <v-card class="card mt-5 bg-grey-darken-2">
        <span
          class="mdi mdi-keyboard-backspace"
          style="font-size: 30px"
          @click="comeback"
        ></span>
        <div class="card-continer d-flex justify-content-evenly">
          <v-avatar color="red-accent-2" size="150" class="align-self-center">
            <v-img
              v-if="user.image"
              :src="user.image"
              :alt="user.first_name"
            ></v-img>
          </v-avatar>
          <div class="w-50">
            <h5 class="font-weight-bold mb-2">Your Account</h5>
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
                Role :
                <span class="font-weight-bold">{{ user.role.name }}</span>
              </h6>
              <h6>
                Email : <span class="font-weight-bold">{{ user.email }}</span>
              </h6>
              <h6>
                Password :
                <span
                  class="font-weight-bold text-blue"
                  @click="$router.push('/change_password')"
                  >change password</span
                >
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
import { useRouter } from "vue-router";

// Variables
const { getCookie } = useCookieStore();
const user = ref(JSON.parse(getCookie("user")));
const router = useRouter();

// Method
const comeback = () => {
  if (user.value.role.name === "restaurant_owner") {
    router.push("/");
  } else {
    router.push(`/${user.value.role.name}`);
  }
};
</script>

<style scoped>
.card {
  margin: auto;
  padding: 10px;
  width: 40%;
}

@media screen and (max-width: 900px) {
  .card {
    width: 70%;
  }
}
@media screen and (max-width: 430px) {
  .card-continer {
    display: flex;
    flex-direction: column;
  }
  .card {
    width: 100%;
  }
}
</style>