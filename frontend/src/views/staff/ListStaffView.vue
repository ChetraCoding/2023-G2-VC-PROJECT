<template>
    <v-layout>
    <!-- Left side bar -->
    <res-owner-side-bar></res-owner-side-bar>

      <header-component title="Manage staff" />

      <v-main style="height: auto">
        <v-slide-group class="text-white">
            <v-slide-group-item>
              <secondary-button class="ma-2">Hello</secondary-button>
              <secondary-button class="mt-2">Hello</secondary-button>
            </v-slide-group-item>
          </v-slide-group>

        <!-- <v-card class="pa-3 mt-3 d-flex justify-space-between">
          <v-icon icon="mdi-plus" size="40" class="rounded-lg" color="orange-darken-4"
            @click="isShowForm = true"></v-icon>
  
        </v-card> -->

        <!-- No staff -->
          <div class="h-screen" v-if="staff.length == 0">
            <h4 class="text-center mt-5 text-orange-darken-4">
              Don't have any staff.
            </h4>
          </div>
          <!--Staff table -->
          <list-staff-table v-else :staff="staff" />
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
