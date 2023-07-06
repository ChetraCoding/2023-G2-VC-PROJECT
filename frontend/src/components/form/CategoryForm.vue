<template>
  <v-form>
    <v-dialog v-model="dialog" persistent width="1024">
      <v-card>
        <v-card-title>
          <span class="text-h5">Create Category</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12">
                <v-text-field v-model="categoryName" label="Enter Category" required></v-text-field>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="white bg-danger"
            variant="text"
            @click="$emit('closeForm'), categoryName = ''"
          >
            Close
          </v-btn>
          <v-btn
            color="white bg-orange"
            variant="text"
            @click="create"
          >
            Save
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-form>
</template>

<script setup>
import { defineProps, defineEmits, computed, ref } from "vue";
const props = defineProps(['isShowForm']);
const emit = defineEmits(['closeForm']);

let categoryName = ref('');

const create = () => {
    console.log(categoryName.value);
    categoryName.value = '';
    emit('closeForm');
}

let dialog = computed(() => {
    return props.isShowForm;
});

</script>