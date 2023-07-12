<template>
  <v-form>
    <v-dialog v-model="dialog" persistent width="1024">
      <v-card class="rounded-xl">
        <v-card-title class="text-center bg-orange-darken-4">
          <span class="text-h6">Create New Table</span>
        </v-card-title>
        <div class="p-3">
          <v-col class="mt-2" cols="12">
            <v-text-field
              v-model="tableNumber"
              label="Number"
              hide-details="auto"
            ></v-text-field>
            <span class="ml-4 text-caption text-red">{{}}</span>
          </v-col>
          <v-card-actions>
            <v-spacer></v-spacer>
            <danger-button @click="$emit('closeForm'), (tableNumber = '')">
              CLOSE
            </danger-button>
            <primary-button @click="add"> SAVE </primary-button>
          </v-card-actions>
        </div>
      </v-card>
    </v-dialog>
  </v-form>
</template>

<script setup>
// ===========front-end================================
import { computed, defineProps, defineEmits, ref } from "vue";

// Variables
const props = defineProps(["isShowForm"]);
const emit = defineEmits(["closeForm"]);
const tableNumber = ref("");

// methods
const add = () => {
  if (tableNumber.value != "") {
    const newtable = { table_number: tableNumber.value };
    emit("closeForm");
    emit("sendData", newtable);
  }
};
const dialog = computed(() => {
  return props.isShowForm;
});

// =============back-end-create-table==========================

// import { defineProps, defineEmits, computed, ref } from "vue";
// import { useTableStore } from "@/stores/table";

// Variables
// const emit = defineEmits(["closeForm"]);
// const props = defineProps(["isShowForm"]);
// const tableStore = useTableStore();
// const tableNumber = ref("");

// method
// let add = async () => {
//   if (tableNumber.value) {
//     await tableStore.storeData({ table_number: tableNumber.value });
//     if (tableStore.error === null) {
//       tableNumber.value = "";
//       emit("closeForm");
//     }
//   } else {
//     tableStore.error = "Please enter a table number.";
//   }
// };

// computed
// const dialog = computed(() => {
//   return props.isShowForm;
// });
</script>