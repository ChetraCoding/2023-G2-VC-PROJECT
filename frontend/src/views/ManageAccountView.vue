<template>
  <v-layout>
    <header-component :class="'m-auto'" title="Manage account" />

    <v-main style="height: auto">
      <div class="card mt-5 pb-4 bg-grey-darken-2">
        <span class="cursor mdi mdi-keyboard-backspace" style="font-size: 30px" @click="comeback"></span>
        <div class="card-continer d-flex justify-content-evenly">
          <v-avatar v-bind="props" class="cursor align-self-center" color="red-accent-2" size="150">
            <v-img v-if="user.image" :src="user.image" :alt="user.first_name" cover></v-img>
          </v-avatar>
          <div class="w-50 content">
            <h5 class="font-weight-bold mb-3 text-center mb-2">Your Account</h5>
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
                <span class="cursor font-weight-bold text-blue" @click="$router.push('/change_password')">change
                  password</span>
              </h6>
            </div>
          </div>
        </div>
      </div>
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

.cursor {
  cursor: pointer;
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

  .content {
    width: 100% !important;
    margin-top: 10px;
  }

  .card {
    width: 100%;
  }
}
</style>