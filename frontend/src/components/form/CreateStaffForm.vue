<template>
  <v-form @submit.prevent="add">
    <v-dialog v-model="dialog" persistent width="750" no-padding>
      <v-card
        class="rounded-xl"
        style="max-width: 100%; max-height: 100vh; overflow-y: auto"
      >
        <v-card-title class="text-center bg-orange-darken-4">
          <span class="text-h6">Create New Staff</span>
        </v-card-title>
        <div class="p-60">
          <v-card-text>
            <v-container size="small">
              <v-row class="justify-center">
                <v-col cols="12" md="4">
                  <v-text-field
                    label="first name*"
                    v-model="staff.first_name"
                    density="compact"
                    hide-details="auto"
                    :error-messages="v$.first_name.$errors.map((e) => e.$message)"
                    @input="v$.first_name.$touch"
                    @blur="v$.first_name.$touch"
                  ></v-text-field>
                </v-col>
                <v-col cols="12" md="4">
                  <v-text-field
                    label="last name*"
                    v-model="staff.last_name"
                    density="compact"
                    hide-details="auto"
                    :error-messages="v$.last_name.$errors.map((e) => e.$message)"
                    @input="v$.last_name.$touch"
                    @blur="v$.last_name.$touch"
                  ></v-text-field>
                </v-col>
                <v-col cols="12" md="4">
                  <v-text-field
                    label="Gender*"
                    v-model="staff.gender"
                    density="compact"
                    hide-details="auto"
                    :error-messages="v$.gender.$errors.map((e) => e.$message)"
                    @input="v$.gender.$touch"
                    @blur="v$.gender.$touch"
                  ></v-text-field>
                </v-col>
                <v-col cols="12">
                  <v-text-field
                    label="Gmail*"
                    v-model="staff.gmail"
                    density="compact"
                    hide-details="auto"
                    :error-messages="v$.gmail.$errors.map((e) => e.$message)"
                    @input="v$.gmail.$touch"
                    @blur="v$.gmail.$touch"
                  ></v-text-field>
                </v-col>
                <v-col cols="12">
                  <v-text-field
                    label="Password*"
                    v-model="staff.password"
                    density="compact"
                    hide-details="auto"
                    :error-messages="v$.password.$errors.map((e) => e.$message)"
                    @input="v$.password.$touch"
                    @blur="v$.password.$touch"
                  ></v-text-field>
                </v-col>
                <v-col cols="12">
                  <v-select
                    label="Role*"
                    v-model="staff.role"
                    :items="items"
                    density="compact"
                    :error-messages="v$.role.$errors.map((e) => e.$message)"
                    @input="v$.role.$touch"
                    @blur="v$.role.$touch"
                  ></v-select>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
          <v-card-actions class="ml-10">
            <v-spacer></v-spacer>
            <danger-button
              @click="
                clear();
                $emit('closeForm');
              "
            >
              CLOSE
            </danger-button>
            <danger-button type="submit" @click="add"> SAVE </danger-button>
          </v-card-actions>
        </div>
      </v-card>
    </v-dialog>
  </v-form>
</template>

<script setup>
import { reactive } from "vue";
import { useVuelidate } from "@vuelidate/core";
import { required, email } from "@vuelidate/validators";
import { defineProps, computed, defineEmits, ref } from "vue";

// Variables
defineEmits(["closeForm"]);
const props = defineProps(["isShowForm"]);
const items = ref(["Chef", "Waiter", "Cashier", "Admin"]);
const inFoStaff = {
  first_name: "",
  last_name: "",
  gender: null,
  gmail: null,
  password: null,
  role: null,
};

const staff = reactive({
  ...inFoStaff,
});

const rules = {
  first_name: { required },
  last_name: { required },
  gender: { required },
  gmail: { required, email },
  password: { required },
  role: { required },
};

const v$ = useVuelidate(rules, staff);

// Method
function clear() {
  v$.value.$reset();
  for (const [key, value] of Object.entries(inFoStaff)) {
    staff[key] = value;
  }
}

function add() {
  if (typeof inFoStaff !== "undefined") {
    for (const field in inFoStaff) {
      const fieldValue = inFoStaff[field];
      if (!fieldValue) {
        rules.value[field] = `Please fill in ${field.replace('_', ' ')}`;
      }
    }
  }
}

// Computed
let dialog = computed(() => {
  return props.isShowForm;
});
</script>