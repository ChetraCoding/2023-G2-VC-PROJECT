<template>
    <v-dialog v-model="dialog" persistent width="400">
      <v-card class="rounded-lg">
        <v-card-title class="text-center bg-red-accent-2">
          <span class="text-h6">Create New Category</span>
        </v-card-title>
        <div>
          <v-col class="mt-2" cols="12">
            <v-text-field
              v-model="categoryName"
              label="Name"
              hide-details="auto"
              @keyup="
                !categoryName
                  ? (error = 'Please enter a category name.')
                  : (error = null)
              "
            ></v-text-field>
            <span class="ml-4 text-caption text-red">{{ error }}</span>
          </v-col>
          <v-card-actions class="bg-grey-lighten-2 p-2">
            <v-spacer></v-spacer>
            <danger-button
              @click="$emit('closeForm'), (error = null), (categoryName = '')"
            >
              <v-icon
                icon="mdi-close-box-multiple"
                color="white"
                size="large"
              ></v-icon>

              CLOSE
            </danger-button>
            <primary-button @click="add">
              <v-icon
                icon="mdi-content-save-all"
                color="white"
                size="large"
              ></v-icon>

              SAVE
            </primary-button>
          </v-card-actions>
        </div>
      </v-card>
    </v-dialog>
</template>

<script setup>
import { defineProps, defineEmits, computed, ref } from "vue";
import { useCategoryStore } from "@/stores/category";
import { storeToRefs } from "pinia";

// Variables
const { storeCategory, getCategory } = useCategoryStore();
const { error } = storeToRefs(useCategoryStore());
const emit = defineEmits(["closeForm"]);
const props = defineProps(["isShowForm"]);
const categoryName = ref("");

// methods
let add = async () => {
  if (!categoryName.value) {
    return (error.value = "Please enter a category name.");
  }
  await storeCategory({ name: categoryName.value });
  if (!error.value) {
    getCategory();
    categoryName.value = "";
    emit("closeForm");
  }
};
// Computed
let dialog = computed(() => {
  return props.isShowForm;
});
</script> 