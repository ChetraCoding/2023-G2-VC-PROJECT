<!-- Referemce: https://play.vuetifyjs.com/
<!- Dialog for form create staff -->
<template>
  <!-- Form create staff -->
  <v-form @submit.prevent="add">
    <!-- Dialog -->
    <v-dialog v-model="dialog" persistent width="800" no-padding>
      <v-card class="rounded-lg bg-white" style="max-width: 100%; max-height: 100vh; overflow-y: auto">
        <!--Card title-->
        <v-card-title class="text-center bg-red-accent-2">
          <span class="font-inter text-h6">Create new staff</span>
        </v-card-title>
        <div class="p-60">
          <!--Card container-->
          <v-container>
            <v-row class="d-flex px-2 mt-1 flex-column justify-center">
              <div class="input-group gap-2">
                <v-text-field v-model="staff.first_name" class="text-black" variant="outlined" label="First name"
                  density="compact" :error-messages="v$.first_name.$errors.map((e) => e.$message)"
                  @input="v$.first_name.$touch" @blur="v$.first_name.$touch"></v-text-field>
                <!--Input last name field-->
                <v-text-field v-model="staff.last_name" class="text-black" label="Last name" density="compact"
                  variant="outlined" :error-messages="v$.last_name.$errors.map((e) => e.$message)"
                  @input="v$.last_name.$touch" @blur="v$.last_name.$touch"></v-text-field>
                <!--Select gender field-->
                <v-select v-model="staff.gender" label="Gender" :items="['Male', 'Female', 'Other']" density="compact"
                  class="text-black" variant="outlined" :error-messages="v$.gender.$errors.map((e) => e.$message)"
                  @input="v$.gender.$touch" @blur="v$.gender.$touch"></v-select>
              </div>
              <!--Input email field-->
              <v-text-field v-model="staff.email" class="mt-2 text-black" label="Email" density="compact"
                variant="outlined" :error-messages="`${v$.email.$errors.map(
                  (e) => e.$message
                )}${err_email}`" @input="v$.email.$touch" @blur="v$.email.$touch"></v-text-field>
              <!--Input field password-->
              <v-text-field v-model="staff.password" label="Password" density="compact" class="mt-2 text-black"
                variant="outlined" :append-inner-icon="showPassword ? 'mdi-eye-off' : 'mdi-eye'"
                :type="showPassword ? 'text' : 'password'" @click:append-inner="showPassword = !showPassword"
                :error-messages="v$.password.$errors.map((e) => e.$message)" @input="v$.password.$touch"
                @blur="v$.password.$touch"></v-text-field>
              <!--Select role field-->
              <v-select v-model="staff.role" label="Role" :items="roles" :item-title="'name'" item-value="role_id"
                density="compact" class="mt-2 text-black" variant="outlined"
                :error-messages="v$.role.$errors.map((e) => e.$message)" @input="v$.role.$touch"
                @blur="v$.role.$touch"></v-select>
            </v-row>
          </v-container>
          <v-card-actions class="bg-grey-lighten-2">
            <v-spacer></v-spacer>
            <!--Close button-->
            <danger-button @click="
              clear();
            $emit('closeForm');
            ">
              <v-icon icon="mdi-close-box-multiple" color="white" size="large">
              </v-icon>
              Close
            </danger-button>
            <!--Save button-->
            <primary-button class="mr-1" type="submit" @click="() => {
              v$.$validate();
              add();
            }
              ">
              <v-icon icon="mdi-content-save-all" color="white" size="large">
              </v-icon>
              Save
            </primary-button>
          </v-card-actions>
          <!--Action-->
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

<style scoped>
.font-inter {
  font-family: 'Inter', sans-serif !important;
}

.input-group {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
}
</style>