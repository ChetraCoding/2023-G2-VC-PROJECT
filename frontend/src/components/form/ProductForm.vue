<template>
  <v-form>
    <v-dialog v-model="dialog" persistent width="800">
      <v-card class="rounded-lg">
        <v-card-title v-if="productInForm.productInForm_id" class="bg-orange-darken-4 text-center">Update productInForm</v-card-title>
        <v-card-title v-else class="bg-orange-darken-4 text-center">Create New productInForm</v-card-title>

        <v-container class="w-100 d-flex">
          <div class="mr-3" style="width: 30%">
            <v-text-field v-model="productInForm.name" required class="mb-3" density="compact" label="Name"
              :error-messages="vp$.name.$errors.map((e) => e.$message)" @input="vp$.name.$touch"
              @blur="vp$.name.$touch"></v-text-field>

            <v-text-field v-model="productInForm.barcode" required class="mb-3" density="compact" label="Barcode"
              :error-messages="`${vp$.barcode.$errors.map((e) => e.$message)}${err_barcode}`"
              @input="vp$.barcode.$touch; err_barcode = '';" @blur="vp$.barcode.$touch"></v-text-field>

            <v-select v-model="productInForm.category" required class="mb-3" label="Category" :items="categories"
              :item-title="'name'" :item-value="'id'" density="compact"
              :error-messages="vp$.category.$errors.map((e) => e.$message)" @change="vp$.category.$touch"
              @blur="vp$.category.$touch">
            </v-select>

            <v-textarea v-model="productInForm.description" required class="mb-3" cols="2" density="compact" label="Description"
              rows="1" :error-messages="vp$.description.$errors.map((e) => e.$message)" @input="vp$.description.$touch"
              @blur="vp$.description.$touch"></v-textarea>

            <v-switch v-model="productInForm.is_active" required color="orange-darken-4" label="Active" hide-details="auto"
              :error-messages="vp$.is_active.$errors.map((e) => e.$message)" @change="vp$.is_active.$touch"
              @blur="vp$.is_active.$touch"></v-switch>
          </div>

          <div class="mr-3" style="width: 50%">
            <div class="d-flex align-center">
              <v-text-field v-model="customize.size" density="compact" label="Size" class="w-50"
                :error-messages="vc$.size.$errors.map((e) => e.$message)" @input="vc$.size.$touch"
                @blur="vc$.size.$touch"></v-text-field>

              <v-text-field v-model="customize.price" density="compact" label="Price" type="number" class="w-50"
                :error-messages="vc$.price.$errors.map((e) => e.$message)" @input="vc$.price.$touch"
                @blur="vc$.price.$touch"></v-text-field>

              <v-icon @click="
                vc$.$validate();
              addCustom(findCustIndex);
              " icon="mdi-plus" color="white" size="30"
                class="ml-2 mb-3 justify-center bg-orange-darken-4 rounded-pill">
              </v-icon>
            </div>

            <div class="mt-3">
              <div v-for="(customize, index) in productInForm.product_customizes" :key="index"
                class="d-flex justify-space-between border-1 pa-2 mb-2" style="border-bottom: 1px solid black"
                width="300px">
                <div>
                  <span>{{ customize.size }}</span>
                </div>
                <div>
                  <span>${{ customize.price }}</span>
                </div>
                <div>
                  <v-icon @click="editCustom(index)" icon="mdi-square-edit-outline" color="blue" size="23"
                    class="mr-1 justify-center">
                  </v-icon>
                  <v-icon @click="deleteCustom(index)" icon="mdi-delete" color="red" size="23" class="justify-center">
                  </v-icon>
                </div>
              </div>
            </div>
          </div>

          <div style="width: 30%">
            <v-file-input required accept="image/png, image/jpeg" :clearable="false" density="compact" label="File input"
              prepend-icon="mdi-file-image" :error-messages="vp$.image.$errors.map((e) => e.$message)" @change="
                vp$.image.$touch;
              imageUpload($event);
              " @blur="vp$.image.$touch"></v-file-input>
            <v-img :src="(productInForm.image)? productInForm.image: (imgPreview)? imgPreview : require('../../assets/select_product.png')" :width="238" :height="175" class="rounded-lg mb-3" aspect-ratio="16/9" cover ></v-img>
          </div>
        </v-container>

        <v-card-actions class="bg-grey-lighten-2">
          <v-spacer></v-spacer>
          <danger-button @click="clearPruduct()">CLOSE</danger-button>
          <primary-button @click="vp$.$validate(); save();">SAVE</primary-button>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-form>
</template>

<script setup>
// Import
import firebase from "firebase";
import { onMounted, ref } from "vue";
import { useProductStore } from "@/stores/product";
import { useCategoryStore } from "@/stores/category";
import { storeToRefs } from "pinia";
import { useVuelidate } from "@vuelidate/core";
import { required } from "@vuelidate/validators";

// Variables
const { storeProduct, resetProductForm } = useProductStore();
const { dialog, productInForm, err_barcode } = storeToRefs(useProductStore());
const { getCategory } = useCategoryStore();
const { categories } = storeToRefs(useCategoryStore());
const imgPreview = ref(null);

// Form: https://vuetifyjs.com/en/components/forms/
// Validation Product
// const initialProduct = {
//   name: null,
//   barcode: null,
//   category: null,
//   description: null,
//   is_active: false,
//   image: null,
// };
// const product = (productInForm.value)? productInForm.value : ref({...initialProduct});

const vp$ = useVuelidate(
  {
    name: { required },
    barcode: { required },
    category: { required },
    description: { required },
    is_active: { required },
    image: { required },
  },
  productInForm
);
const clearPruduct = () => {
  dialog.value = false;
  clearCustomize();
  err_barcode.value = "";
  imgPreview.value = null;
  resetProductForm();
  vp$.value.$reset();
};

// Validation Customize
const findCustIndex = ref(null);
const initialCustomize = {
  size: null,
  price: null,
};
const customize = ref({
  ...initialCustomize,
});
const vc$ = useVuelidate(
  {
    size: { required },
    price: { required },
  },
  customize
);
const clearCustomize = () => {
  vc$.value.$reset();
  for (const [key, value] of Object.entries(initialCustomize)) {
    customize.value[key] = value;
  }
};

// Method
const imageUpload = (e) => {
  const file = e.target.files[0];
  if (file) {
    // Base64 converter
    const reader = new FileReader();
    reader.onload = () => {
      imgPreview.value = reader.result;
    };
    reader.readAsDataURL(file);

    // Upload to firebase cloud
    const storageRef = firebase
      .storage()
      .ref(`${file.name}`)
      .put(file);
    storageRef.on(
      `state_changed`,
      (snapshot) => {
        console.log(snapshot);
      },
      (error) => {
        console.log(error.message);
      },
      () => {
        storageRef.snapshot.ref.getDownloadURL().then((url) => {
          productInForm.value.image = url;
        });
      }
    );
  }
};

// Add customizes
const addCustom = (custIndex) => {
  if (vc$.value.$errors.length === 0) {
    if (custIndex !== null) {
      productInForm.value.product_customizes[custIndex].size = customize.value.size;
      productInForm.value.product_customizes[custIndex].price = customize.value.price;
    } else {
      productInForm.value.product_customizes.push({ ...customize.value });
      clearCustomize();
    }
    findCustIndex.value = null;
  }
};
const deleteCustom = (index) => {
  productInForm.value.product_customizes.splice(index, 1);
};

const editCustom = (index) => {
  findCustIndex.value = index;
  customize.value.size = productInForm.value.product_customizes[index].size;
  customize.value.price = productInForm.value.product_customizes[index].price;
};

const save = async () => {
  if (productInForm.value.product_customizes.length === 0) vc$.value.$touch();
  // product.value.product_customizes = product.value.product_customizes;
  if (vp$.value.$errors.length === 0 && productInForm.value.product_customizes.length > 0) {
    await storeProduct(productInForm.value);
    if (!err_barcode.value) {
      dialog.value = false;
      clearCustomize();
      clearPruduct();
    }
  }
};

// Lifecycle hook
onMounted(() => {
  getCategory();
});
</script>