<template>
  <v-form>
    <v-dialog v-model="dialog" persistent width="800">
      <v-card class="rounded-lg">
        <v-card-title class="text-center bg-orange-darken-4">
          <span class="text-h6">Create New Table</span>
        </v-card-title>
        <div>
          <v-col class="mt-2" cols="12">
            <v-text-field
              v-model="tableNumber"
              label="Number"
              hide-details="auto"
              @keyup="
                !tableNumber
                  ? (error = 'Please enter a table number.')
                  : (error = null)
              "
            ></v-text-field>
            <span class="ml-4 text-caption text-red">{{ error }}</span>
          </v-col>
          <v-card-actions class="bg-grey-lighten-2 p-2">
            <v-spacer></v-spacer>
            <danger-button
              @click="$emit('closeForm'), (error = null), (tableNumber = '')"
            >
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
import { defineProps, defineEmits, computed, ref } from "vue";
import { useTableStore } from "@/stores/table";
import { storeToRefs } from "pinia";

// Variables
const { storeTable, getTables } = useTableStore();
const { error } = storeToRefs(useTableStore());
const emit = defineEmits(["closeForm"]);
const props = defineProps(["isShowForm"]);
const tableNumber = ref("");

// method
let add = async () => {
  if (!tableNumber.value) return (error.value = "Please enter a table number.");
  await storeTable({ table_number: tableNumber.value });
  if (!error.value) {
    getTables();
    tableNumber.value = "";
    emit("closeForm");
  }
};

// computed
const dialog = computed(() => {
  return props.isShowForm;
});
</script>