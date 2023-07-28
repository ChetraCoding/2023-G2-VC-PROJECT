<template>
  <v-layout>
    <v-main class="h-screen d-flex flex-column align-center">
      <div class="w-100">
        <v-icon
          @click="comeback"
          class="text-h4 text-white ml-5"
          icon="mdi-keyboard-backspace"
        ></v-icon>
      </div>
      <div class="card pb-4 bg-grey-darken-2">
        <div class="d-flex">
          <header class="font-inter w-100 text-center text-white text-h6">
            Your Profile
          </header>
        </div>

        <div
          class="card-continer d-flex flex-column justify-content-evenly gap-2"
        >
          <v-avatar size="150" class="profile mt-3 align-self-center">
            <v-img
              v-if="userInfo.image"
              :src="userInfo.image"
              :alt="userInfo.first_name"
            ></v-img>
            <span v-else class="text-h2 text-white">{{ initials }}</span>
          </v-avatar>
          <primary-button
            class="px-2 mt-2 align-self-center"
            @click="showEditForm"
          >
            <v-icon
              icon="mdi-square-edit-outline"
              color="white"
              size="large"
            ></v-icon>
            Edit
          </primary-button>
          <div class="content mt-3 mx-4">
            <div>
              <div class="d-flex">
                <div class="w-50">
                  <h6>
                    First Name :
                    <span>{{ userInfo.first_name }}</span>
                  </h6>
                </div>
                <div class="w-50">
                  <h6>
                    Last Name :
                    <span>{{ userInfo.last_name }}</span>
                  </h6>
                </div>
              </div>
              <div class="d-flex">
                <div class="w-50">
                  <h6>
                    Gender :
                    <span>{{ userInfo.gender }}</span>
                  </h6>
                </div>
                <div class="w-50">
                  <h6 class="text-capitalize">Role : {{ userRole }}</h6>
                </div>
              </div>
              <h6>
                Email :
                <span>{{ userInfo.email }}</span>
              </h6>
              <h6>
                Password :
                <span
                  class="cursor text-blue"
                  @click="$router.push('/change_password')"
                  >Change password</span
                >
              </h6>
            </div>
          </div>
        </div>
      </div>
    </v-main>
  </v-layout>
  <update-profile-form
    :initials="initials"
    :isShowForm="isShowForm"
    @closeForm="closeForm"
  />
</template>
<script setup>
import { onMounted, ref } from "vue";
import { useCookieStore } from "@/stores/cookie";
import { useUserStore } from "@/stores/user";
import { useRouter } from "vue-router";
import { storeToRefs } from "pinia";

// Variables
const { clearProfileForm } = useUserStore();
const { getCookie } = useCookieStore();
const { userProfileInForm } = storeToRefs(useUserStore());

const router = useRouter();
const isShowForm = ref(false);
const userInfo = ref(JSON.parse(getCookie("user")));
const userRole = ref(
  getCookie("user_role") === "restaurant_owner"
    ? "restaurant owner"
    : getCookie("user_role")
);
const initials = ref(
  userInfo.value.first_name.slice(0, 1).toUpperCase() +
    userInfo.value.last_name.slice(0, 1).toUpperCase()
);

// Method
const comeback = () => {
  if (getCookie("user_role") === "restaurant_owner") {
    router.push("/");
  } else {
    router.push(`/${getCookie("user_role")}`);
  }
};
const showEditForm = async () => {
  userProfileInForm.value = userInfo.value;
  isShowForm.value = true;
};

// Close update profile form
const closeForm = () => {
  isShowForm.value = false;
  clearProfileForm();
  userInfo.value = JSON.parse(getCookie("user"));
  initials.value =
    userInfo.value.first_name.slice(0, 1).toUpperCase() +
    userInfo.value.last_name.slice(0, 1).toUpperCase();
};

onMounted(async () => {
  userInfo.value = JSON.parse(getCookie("user"));
});
</script>

<style scoped>
.profile {
  background: #2c2c2c;
}
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
    margin-left: 1px !important;
    margin-right: 1px !important;
  }

  .card {
    margin-left: 1p;
    width: 100%;
  }
}
</style>