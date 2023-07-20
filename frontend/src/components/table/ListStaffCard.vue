<template>
  <!--Alert success-->
  <base-alert v-model="deleteSuccess">
    <v-icon class="mr-2 text-h4 mdi mdi-check-circle"></v-icon>
    <h6 class="mt-2">Deleted staff successfully!</h6>
  </base-alert>
  <!--Card-->
  <v-card
    class="d-flex justify-space-between align-center pa-2 ma-2 bg-grey-darken-2 rounded-lg"
  >
    <span class="w-15 ml-2">{{ user.first_name }}</span>
    <span class="w-15">{{ user.last_name }}</span>
    <span class="w-15">{{ user.gender }}</span>
    <span class="w-20">{{ user.email }}</span>
    <span class="w-15 pl-5">{{ user.role }}</span>
    <v-card-actions class="w-20 d-flex justify-end">
      <!--Edit button-->
      <dark-button>
        <v-icon icon="mdi-square-edit-outline"></v-icon>
        Edit
      </dark-button>
      <!--Delete button-->
      <danger-button
      @click="isDelete=true"
      >
        <v-icon icon="mdi-delete-forever"></v-icon>
        Delete
      </danger-button>
    </v-card-actions>
    <!--Action-->
  </v-card>
  <!-- Delete dialog -->
  <base-dialog v-model="isDelete" title="Confirm delete" ms="Are you sure you want to delete staff?">
    <danger-button @click="isDelete = false">
      <v-icon icon="mdi-close-box-multiple" color="white" size="large"></v-icon>
      Cancel
    </danger-button>
    <primary-button @click="deleteStaff(user.user_id),closeForm()">
      <v-icon icon="mdi-checkbox-multiple-marked" color="white" size="large"></v-icon>
      Delete
    </primary-button>
  </base-dialog>


</template>

<script setup>
// Import
import { defineProps, ref } from "vue";
import { useUserStore } from "@/stores/user";
import { storeToRefs } from "pinia";
const { deleteSuccess } = storeToRefs(useUserStore());


// Variables
defineProps(["user"]);
const isDelete = ref(false);
const deleteStaff = (id)=>{
  deleteSuccess.value = true;
  console.log(id);
};
// Mothods
const closeForm = ()=>{
  isDelete.value = false;
  console.log("Delete staff successfully");
};


</script>

<style scoped>
.card-summary {
  background: #2c2c2c;
}
.w-15 {
  width: 15%;
}
.w-20 {
  width: 20%;
}
</style>
