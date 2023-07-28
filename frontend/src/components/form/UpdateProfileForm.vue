<!-- Referemce: https://play.vuetifyjs.com/
<!- Dialog for update profile -->
<template>
  <!-- Form update profile -->
  <v-form>
    <!-- Dialog -->
    <v-dialog v-model="dialog" persistent width="550" no-padding>
      <v-card
        class="rounded-lg bg-white"
        style="max-width: 100%; max-height: 100vh; overflow-y: auto"
      >
        <!--Card title-->
        <v-card-title class="text-center bg-red-accent-2">
          <span class="font-inter text-h6">Update Profile</span>
        </v-card-title>
        <div class="p-60">
          <!--Card container-->
          <v-container>
            <v-row class="d-flex px-2 mt-1 flex-column justify-center gap-2">
              <v-avatar
                color="red-accent-2"
                size="150"
                class="align-self-center"
              >
                <v-img
                  v-if="user.image"
                  :src="user.image"
                  :alt="user.first_name"
                ></v-img>
                <input type="file" class="input-image"  />
              </v-avatar>
              <div class="gap-2">
                <!--Input first name field-->
                <v-text-field
                  v-model="user.first_name"
                  class="text-black"
                  variant="outlined"
                  label="First name"
                  density="compact"
                  :error-messages="v$.first_name.$errors.map((e) => e.$message)"
                  @blur="v$.first_name.$touch"
                ></v-text-field>
                <!--Input last name field-->
                <v-text-field
                  v-model="user.last_name"
                  class="text-black"
                  label="Last name"
                  density="compact"
                  variant="outlined"
                  :error-messages="v$.last_name.$errors.map((e) => e.$message)"
                  @blur="v$.last_name.$touch"
                ></v-text-field>
                <!--Select gender field-->
                <v-select
                  v-model="user.gender"
                  label="Gender"
                  :items="['Male', 'Female', 'Other']"
                  density="compact"
                  class="text-black"
                  variant="outlined"
                  :error-messages="v$.gender.$errors.map((e) => e.$message)"
                  @blur="v$.gender.$touch"
                ></v-select>
              </div>
              <!--Input email field-->
              <v-text-field
                v-model="user.email"
                class="mt-2 text-black"
                label="Email"
                density="compact"
                variant="outlined"
                :error-messages="`${v$.email.$errors.map(
                  (e) => e.$message
                )}${errMessage}`"
                @blur="v$.email.$touch"
              ></v-text-field>
            </v-row>
          </v-container>
          <v-card-actions class="bg-grey-lighten-2">
            <v-spacer></v-spacer>
            <!--Close button-->
            <danger-button @click="$emit('closeForm')">
              <v-icon icon="mdi-close-box-multiple" color="white" size="large">
              </v-icon>
              Close
            </danger-button>
            <!--Save button-->
            <primary-button
              class="mr-1"
              type="submit"
              @click="
                () => {
                  v$.$validate();
                  save();
                }
              "
            >
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
  <!-- Alert update success -->
  <base-alert v-model="updateSuccess">
    <v-icon class="mr-2 text-h4 mdi mdi-check-circle"></v-icon>
    <h5 class="mt-2">Updated profile succeefully.</h5>
  </base-alert>
</template>

<script setup>
// Import
import { onMounted } from "vue";
import { useVuelidate } from "@vuelidate/core";
import { required, email } from "@vuelidate/validators";
import { defineProps, computed, defineEmits, ref } from "vue";
import { useUserStore } from "@/stores/user";
import { useRoleStore } from "@/stores/role";
import { storeToRefs } from "pinia";
import { useCookieStore } from "@/stores/cookie";
// Variables
const { updateProfile } = useUserStore();
const { getRoles } = useRoleStore();
const { UserProfileInForm, errMessage, updateSuccess } = storeToRefs(
  useUserStore()
);
const { getCookie } = useCookieStore();
const user = ref(JSON.parse(getCookie("user")));
const emit = defineEmits(["closeForm"]);
const props = defineProps(["isShowForm"]);
UserProfileInForm.value = user;
const rules = {
  first_name: { required },
  last_name: { required },
  gender: { required },
  email: { required, email },
  image: { required },
};

const v$ = useVuelidate(rules, UserProfileInForm);

const save = async () => {
  const editProfile = ref({
    user_id: user.value.user_id,
    first_name: user.value.first_name,
    last_name: user.value.last_name,
    gender: user.value.gender,
    email: user.value.email,
    image: user.value.image,
  });
  if (v$.value.$errors.length === 0) {
    if (UserProfileInForm.value.user_id) {
      await updateProfile(editProfile.value);
      emit("closeForm");
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
  font-family: "Inter", sans-serif !important;
}

.input-image {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  cursor: pointer;
}
</style>