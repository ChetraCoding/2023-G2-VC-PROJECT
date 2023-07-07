<template>
  <v-form @submit.prevent="">
    <v-dialog v-model="dialog" persistent width="1024">
      <v-card class="p-4 rounded-lg">
        <v-card-title>
          <span class="text-h5">Create New Category</span>
        </v-card-title>
        <v-col cols="12">
          <v-text-field
            v-model="name"
            label="Enter Category"
            required
          ></v-text-field>
        </v-col>
        <v-card-actions>
          <v-spacer></v-spacer>

          <danger-button @click="$emit('closeForm')"> CLOSE </danger-button>

          <!-- <primary-button @click="create" > SAVE </primary-button> -->
          <primary-button @click="createCategory" type="submit">
            SAVE
          </primary-button>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-form>
</template>

<script setup>
import { defineProps, defineEmits, computed, ref } from "vue";
const props = defineProps(["isShowForm"]);
const emit = defineEmits(["closeForme", "create-cate"]);


// import { useCategoryStore } from "../../stores/category";
// import { useCookieStore } from "../../stores/cookie";
// const store = useCategoryStore();
// // const state = mapState(store, ["isloading"]);
// const actions = useCookieStore(store, ["createCategory"]);

let name = ref("");
// const createCategory =  () => {
//   const category = {
//     name: name.value,
//       };
//       actions.createCategory(category);
//      emit("closeForm");
//     emit("createCate",category);
// };

// -------------------------------
const createCategory = async () => {
  try {
    const category = name.value ;
    if(category ){
      name.value = "";
      emit("closeForm");
      emit("createCate",category);
    }
  } catch (error) {
    console.error(error);
  }
};

let dialog = computed(() => {
  return props.isShowForm;
  
});
</script>