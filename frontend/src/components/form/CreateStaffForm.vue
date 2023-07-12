<template>
  <v-form @submit.prevent="submit">
    <v-dialog v-model="dialog" persistent width="600">
      <v-card class="rounded-xl">
        <v-card-title class="text-center bg-orange-darken-4">
          <span class="text-h6">Create New Staff</span>
        </v-card-title>
        <div class="p-3">
          <v-card-text>
            <v-container>
              <v-row class="justify-center">
                <v-col cols="12">
                  <v-text-field
                    label="first name*"
                    v-model="firs_name"
                    :rules="requireName"
                    density="compact"
                    hide-details="auto"
                    required
                    :error-messages="firs_name === '' ? ['Please enter a first name'] : []"
                  ></v-text-field>
                  <!-- <span class="text-red" v-if="firs_name == ''">first Name</span> -->
                </v-col>
                <v-col cols="12">
                  <v-text-field
                    label="last name*"
                    v-model="last_name"
                    density="compact"
                    hide-details="auto"
                    required
                    :error-messages="last_name === '' ? ['Please enter a last name'] : []"
                  ></v-text-field>
                  <!-- <span class="text-red" v-if="last_name == ''">Please input last name</span> -->
                </v-col>
                <v-col cols="12">
                  <v-text-field
                    label="Gender*"
                    v-model="gender"
                    density="compact"
                    hide-details="auto"
                    required
                    :error-messages="gender === '' ? ['Please enter a gender'] : []"
                  ></v-text-field>
                  <!-- <span class="text-red" v-if="gender == ''" >Please input gender</span> -->
                </v-col>
                <v-col cols="12">
                  <v-select
                    label="Role*"
                    :items="items"
                    v-model="role"
                    density="compact"
                    :error-messages="role === '' ? ['Please select a role'] : []"
                  ></v-select>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
          <v-card-actions class="ml-10">
            <v-spacer></v-spacer>
            <danger-button @click="$emit('closeForm')"> CLOSE </danger-button>
            <primary-button type="submit" @click="add"> SAVE </primary-button>
          </v-card-actions>
        </div>
      </v-card>
    </v-dialog>
  </v-form>
</template>

<script setup>
import { defineProps, computed, defineEmits, ref } from "vue";

// Variables
defineEmits(["closeForm"]);
const props = defineProps(["isShowForm"]);
const items = ref(['Chef', 'Waiter', 'Cashier', 'Admin']);
const firs_name = ref('');
const last_name = ref('');
const gender = ref('');
const role = ref('');

// Validate






// Computed
let dialog = computed(() => {
  return props.isShowForm;
});
</script>
