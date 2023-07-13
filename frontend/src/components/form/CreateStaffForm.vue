<!-- Referemce: https://play.vuetifyjs.com/#eNqVVUtv2zAM/iuCUSAJENvbWmBAkGYZsB122Q4Ddkly8INp1MiSJ8leiyL/fZTkZ+q8Lq1M8iP5faKY1Zv3Nc+DsgBv5s01ZDmLNCzWnJD5VsjMnvBc+hpetL+lwFJnIqT0M5ECe1x7SiMo4FEGa6/2zkBKIf0MlIqeQGFUeWdDgjvrUUEW5WMgjwuCpips0sEnouAaJAI/fmjNLIptyZ+9YhL+FlRC09qS8rzQ3ZpaFMmuBSxjVpjUw/7FPOwSRhFukAGyiLILOtiYK4WoGX/3+4nPca7ynyY9FHCGtQIGiT7FuPK2lCkOkmFq/1+QwoFv1OIHJj6jRLKL+BP085/WYjDCiuE8XSGSHST7WLyckqLxnyddh91I+5sgr6Ig0ZME+HIl/7bUaQVOxFgNal9XhVhzkrBIGTYZ+A9rD2symuxdursyYjRFOdbegqgizqgmJhXC2n1icjSghEEkTbQ99ILnYbWH5mFnPeGnSiTNNVGgi9xG0iwXUpM31CNKNC2BHMhWioyMcL2NehGFgj8FuCabqCWGOVOYCHmEsA9m2kg9BKpY43Ui1IATwZUmlFNNI/bbzAd5JG9OAbN1ZmQ0mrpPm77z7SZvRnjBWGWqL6JjPHTr2AHEAjX7cVUpCIJuCw446XVonikiVyPzrsjH0ZS406fmdN+cHkabLlYWDAy2R8tcQa1Tn2DrmTpTE1AzHsDa/gY9rSbvnD1tyjtssXvpY9v31IlWibEtOAonzGjjEI4nNSecaLzaAl+mBJy2cRWOACHJ2BVY7eF1SmzYhogt+RU/m50CXEsKaty9gEmTGEkbg8FusD+Ldh5s3v6Zh27Kcb69qcco36vgWQmOP9Y2B74chQt2RlYOt/Z2WudqFoZJyjESVxMtZcBBhzzPQpxVTbevy/vgPvgcplTp2uTjilGBTWYy4RUfsKCbfvzdyY+qOoetXHHBh4/N4/eFFsx7CSX+slNcHKnIbC8PrpeOOQCV+bEU/xRITLL2qgu3ZUzDV5S6xBZLvEsdYr0SpC+BpyABd9J1jI5gXVZHrrPM/BQyeh01GxoyGocUE78EWS/X0S67kkYH4Xp3qd8JNbj0bqvR4oYqVeN/8A5Tz0qJw2iv0dv8B32+fuE= -->
<!-- Dialog for form create staff -->
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
                    label="First name*"
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
                <v-col cols="12" md="4">
                  <v-text-field
                    label="Last name*"
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
                <v-col cols="12" md="4">
                  <v-select
                    label="Gender*"
                    v-model="staff.gender"
                    :items="['Male', 'Female', 'Other']"
                    density="compact"
                    hide-details="auto"
                    :error-messages="v$.gender.$errors.map((e) => e.$message)"
                    @input="v$.gender.$touch"
                    @blur="v$.gender.$touch"
                  ></v-select>
                </v-col>
                <v-col cols="12">
                  <v-text-field
                    label="Email*"
                    v-model="staff.email"
                    density="compact"
                    hide-details="auto"
                    :error-messages="`${v$.email.$errors.map(
                      (e) => e.$message
                    )}${err_email}`"
                    @input="v$.email.$touch"
                    @blur="v$.email.$touch"
                  ></v-text-field>
                </v-col>
                <v-col cols="12">
                  <v-text-field
                    label="Password*"
                    v-model="staff.password"
                    density="compact"
                    :append-icon="showPassword ? 'mdi-eye-off' : 'mdi-eye'"
                    :type="showPassword ? 'text' : 'password'"
                    @click:append="showPassword = !showPassword"
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
            <primary-button
              type="submit"
              @click="
                () => {
                  v$.$validate();
                  add();
                }
              "
              >SAVE</primary-button
            >
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
