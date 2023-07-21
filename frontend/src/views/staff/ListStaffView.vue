<template>
  <v-layout>
    <!-- Left side bar -->
    <res-owner-side-bar></res-owner-side-bar>

    <!-- Main -->
    <v-main>
      <!--Header -->
      <header-component title="Manage staff" />

      <!-- Tab roles-->
      <v-slide-group>
        <v-slide-group-item>
          <secondary-button class="ml-2 mt-2">Hello</secondary-button>
          <secondary-button class="ml-2 mt-2">Hello</secondary-button>
        </v-slide-group-item>
      </v-slide-group>

      <!--List staff card-->
      <div class="mt-2" v-if="staff.length > 0">
        <list-staff-card v-for="user in staff" :key="user.user_id" :user="user"/>
      </div>
      <!-- No staff -->
      <div class="h-screen" v-else>
        <h4 class="text-center mt-5 text-orange-darken-4">
          Don't have any staff.
        </h4>
      </div>

      <!--Staff summary -->
      <summary-component class="mt-2" title="Staff Summary">
        <template v-slot:btn>
          <secondary-button @click="isShowForm = true">
            <v-icon
              icon="mdi-plus-box-multiple"
              color="white"
              size="large"
            ></v-icon>
            Add More
          </secondary-button>
        </template>
        <template v-slot:content>
          <div
            class="bg-grey-darken-2 mt-2 rounded-lg d-flex justify-space-between align-center"
          >
            <div class="w-50 card-summary py-2 m-2 rounded-lg text-center">
              Cashier
            </div>
            <span class="mr-2">3 person</span>
          </div>
          <div
            class="bg-grey-darken-2 mt-4 py-3 rounded-lg d-flex justify-space-between align-center"
          >
            <span class="ml-2">Total</span>
            <span class="mr-2">3 items</span>
          </div>
        </template>
      </summary-component>
    </v-main>
  </v-layout>

  <create-staff-form :isShowForm="isShowForm" @closeForm="closeForm" />
</template>

<script setup>
import { ref } from "vue";
import CreateStaffForm from "@/components/form/CreateStaffForm.vue";
import { onMounted } from "vue";
import { useUserStore } from "@/stores/user";
import { storeToRefs } from "pinia";

// Dialog of staff
const isShowForm = ref(false);
const closeForm = () => {
  isShowForm.value = false;
};

// Variable
const { getStaff } = useUserStore();
const { staff } = storeToRefs(useUserStore());

// LifeCycle hook
onMounted(() => {
  getStaff();
});
</script>

<style scoped>
.card-summary {
  background: #2c2c2c;
}
</style>