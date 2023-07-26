<template>
  <router-view></router-view>
</template>

<script setup>
import http from "@/http-common";
import { storeToRefs } from "pinia";
import { useUserStore } from "@/stores/user";
import { useOneSignal } from "@onesignal/onesignal-vue3";
import { onBeforeMount } from "vue";

// Variables
const { getUser } = useUserStore();
const { user } = storeToRefs(useUserStore());
const oneSignal = useOneSignal();

// On subscription change on OneSignal icon
oneSignal.on("subscriptionChange", (isSubscribed) => {
  // Only chef and cashier can be get notification from OneSignal
  if (user.value) {
    if (
      isSubscribed &&
      (user.value.role === "chef" || user.value.role === "cashier")
    ) {
      oneSignal.getUserId(async function (playerId) {
        try {
          const res = await http.post("onsignal", {
            player_id: playerId,
            user_id: user.value.user_id,
          });
          if (res.data.success) {
            console.log("You have subscribe to notification.");
          }
        } catch (err) {
          console.log(err);
        }
      });
    }
  }
});

onBeforeMount(async () => {
  await getUser();
});
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400&display=swap");

* {
  padding: 0;
  margin: 0;
  font-family: "Inter", sans-serif !important;
}

body {
  background: #2c2c2c !important;
}

.font-inter {
  font-family: "Inter", sans-serif !important;
}

.active {
  background: #f25657;
}
</style>
