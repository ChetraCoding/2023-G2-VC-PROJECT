<template>
  <v-card>
    <v-layout>
      <side-bar />

      <header-component title="Staff" />

      <v-main style="height: auto">
        <v-card class="pa-3 mt-3 d-flex justify-space-between">
          <v-icon
            icon="mdi-plus"
            size="40"
            class="rounded-lg"
            color="orange-darken-4"
          ></v-icon>
          <v-spacer></v-spacer>
          <v-text-field
            density="compact"
            variant="outlined"
            placeholder="Search staff"
            append-inner-icon="mdi-magnify"
          ></v-text-field>
        </v-card>
        <!-- No staff -->
        <div class="d-flex flex-wrap justify-content-center gap-3">
          <div class="h-screen" v-if="staff.length == 0">
            <h4 class="text-center mt-5 text-orange-darken-4">
              Don't have any staff.
            </h4>
          </div>
          <!--Staff table -->
          <list-staff-table v-else :staff="staff" />
        </div>
      </v-main>
    </v-layout>
  </v-card>
</template>

<script setup>
import { onMounted } from "vue";
import { useUserStore } from "@/stores/user";
import { storeToRefs } from "pinia";

// Variable
const { getStaff } = useUserStore();
const { staff } = storeToRefs(useUserStore());

// LifeCycle hook
onMounted(() => {
  getStaff();
});
</script>
