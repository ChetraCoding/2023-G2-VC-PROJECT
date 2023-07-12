<template>
  <v-form>
    <v-dialog v-model="dialog" persistent width="1024">
      <v-card class="rounded-xl">
        <v-card-title class="text-center bg-orange-darken-4">
          <span class="text-h6">Create New Category</span>
        </v-card-title>
        <div class="p-3">
          <v-col class="mt-2" cols="12">
            <v-text-field
              v-model="categoryName"
              label="Name"
              hide-details="auto"
              @keyup="
                !categoryName
                  ? (categoryStore.error = 'Please enter a category name.')
                  : (categoryStore.error = null)
              "
            ></v-text-field>
            <span class="ml-4 text-caption text-red">{{
              categoryStore.error
            }}</span>
          </v-col>
          <v-card-actions>
            <v-spacer></v-spacer>
            <danger-button
              @click="
                $emit('closeForm'),
                  (categoryStore.error = null),
                  (categoryName = '')
              ">
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
import { useCategoryStore } from "@/stores/category";

// Variables
const emit = defineEmits(["closeForm"]);
const props = defineProps(["isShowForm"]);
const categoryStore = useCategoryStore();
const categoryName = ref("");

// methods
let add = async () => {
  if (categoryName.value) {
    await categoryStore.storeData({ name: categoryName.value });
    if (categoryStore.error === null) {
      categoryName.value = "";
      emit("closeForm");
    }
  } else {
    categoryStore.error = "Please enter a category name.";
  }
};

// Computed
let dialog = computed(() => {
  return props.isShowForm;
});
</script>