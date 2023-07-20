<!-- Referemce: https://play.vuetifyjs.com/
<!- Dialog for form create staff -->
<template>
  <!-- Form create staff -->
  <v-form @submit.prevent="add">
    <!-- Dialog -->
    <v-dialog v-model="dialog" persistent width="800" no-padding>
      <!--Card-->
      <v-card
        class="rounded-lg"
        style="max-width: 100%; max-height: 100vh; overflow-y: auto"
      >
        <!--Card title-->
        <v-card-title class="text-center bg-red-accent-2">
          <span class="text-h6">Create new staff</span>
        </v-card-title>
        <div class="p-60">
          <v-card-text>
            <!--Card container-->
            <v-container size="small">
              <v-row class="justify-center">
                <!--Input first name field-->
                <v-col cols="12" md="4">
                  <v-text-field
                    label="First name"
                    v-model="staff.first_name"
                    density="compact"
                    hide-details="auto"
                    :error-messages="
                      v$.first_name.$errors.map((e) => e.$message)
                    "
                    @input="v$.first_name.$touch"
                    @blur="v$.first_name.$touch"
                  ></v-text-field>
                </v-col>
                <!--Input last name field-->
                <v-col cols="12" md="4">
                  <v-text-field
                    label="Last name"
                    v-model="staff.last_name"
                    density="compact"
                    hide-details="auto"
                    :error-messages="
                      v$.last_name.$errors.map((e) => e.$message)
                    "
                    @input="v$.last_name.$touch"
                    @blur="v$.last_name.$touch"
                  ></v-text-field>
                </v-col>
                <!--Select gender field-->
                <v-col cols="12" md="4">
                  <v-select
                    label="Gender"
                    v-model="staff.gender"
                    :items="['Male', 'Female', 'Other']"
                    density="compact"
                    hide-details="auto"
                    :error-messages="v$.gender.$errors.map((e) => e.$message)"
                    @input="v$.gender.$touch"
                    @blur="v$.gender.$touch"
                  ></v-select>
                </v-col>
                <!--Input email field-->
                <v-col cols="12">
                  <v-text-field
                    label="Email"
                    v-model="staff.email"
                    density="compact"
                    hide-details="auto"
                    :error-messages="`${v$.email.$errors.map((e) => e.$message)}${err_email}`"
                    @input="v$.email.$touch"
                    @blur="v$.email.$touch"
                  ></v-text-field>
                </v-col>
                <!--Input field password-->
                <v-col cols="12">
                  <v-text-field
                    label="Password"
                    v-model="staff.password"
                    density="compact"
                    :append-inner-icon="showPassword ? 'mdi-eye-off' : 'mdi-eye'"
                    :type="showPassword ? 'text' : 'password'"
                    @click:append-inner="showPassword = !showPassword"
                    hide-details="auto"
                    :error-messages="v$.password.$errors.map((e) => e.$message)"
                    @input="v$.password.$touch"
                    @blur="v$.password.$touch"
                  ></v-text-field>
                </v-col>
                <!--Select role field-->
                <v-col cols="12">
                  <v-select
                    label="Role"
                    v-model="staff.role"
                    :items="roles"
                    :item-title="'name'"
                    item-value="role_id"
                    density="compact"
                    :error-messages="v$.role.$errors.map((e) => e.$message)"
                    @input="v$.role.$touch"
                    @blur="v$.role.$touch"
                  ></v-select>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
          <!--Action-->
          <v-card-actions class="bg-grey-lighten-2">
            <v-spacer></v-spacer>
            <!--Close button-->
            <danger-button
              @click="
                clear();
                $emit('closeForm');
              "
              >
              <v-icon
                icon="mdi-close-box-multiple"
                color="white"
                size="large"
              >
              </v-icon>
              Close
            </danger-button>
            <!--Save button-->
            <primary-button
              type="submit"
              @click="
                () => {
                  v$.$validate();
                  add();
                }
              "
              >
              <v-icon
                icon="mdi-content-save-all"
                color="white"
                size="large"
              >
              </v-icon>
              Save
              </primary-button>
          </v-card-actions>
        </div>
      </v-card>
    </v-dialog>
  </v-form>

  <!-- Alert success -->
  <base-alert v-model="success">
    <v-icon class="mr-2 text-h4 mdi mdi-check-circle"></v-icon>
    <h5 class="mt-2">Added staff succeefully!</h5>
  </base-alert>
</template>

<script setup>
// Import
import { onMounted, reactive } from "vue";
import { useVuelidate } from "@vuelidate/core";
import { required, email, minLength } from "@vuelidate/validators";
import { defineProps, computed, defineEmits, ref } from "vue";
import { useUserStore } from "@/stores/user";
import { useRoleStore } from "@/stores/role";
import { storeToRefs } from "pinia";

// Variables
const { addStaff } = useUserStore();
const { getRoles } = useRoleStore();
const { err_email, success } = storeToRefs(useUserStore());
const { roles } = storeToRefs(useRoleStore());
const emit = defineEmits(["closeForm"]);
const props = defineProps(["isShowForm"]);
const showPassword = ref(false);
const inFoStaff = {
  first_name: "",
  last_name: "",
  gender: null,
  email: null,
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
  email: { required, email },
  password: { required, minLength: minLength(8) },
  role: { required },
};

const v$ = useVuelidate(rules, staff);

// Methods
const clear = () => {
  emit("closeForm");
  err_email.value = "";
  v$.value.$reset();
  for (const [key, value] of Object.entries(inFoStaff)) {
    staff[key] = value;
  }
};

const add = async () => {
  if (v$.value.$errors.length === 0) {
    const newStaff = {
      role_id: staff.role,
      first_name: staff.first_name,
      last_name: staff.last_name,
      gender: staff.gender,
      email: staff.email,
      password: staff.password,
    };
    await addStaff(newStaff);
    console.log(err_email);
    if (!err_email.value) {
      success.value = true;
      clear();
    }
  }
};

// Computed
let dialog = computed(() => {
  return props.isShowForm;
});

// Lifecycle hook
onMounted(() => {
  getRoles();
});
</script>
