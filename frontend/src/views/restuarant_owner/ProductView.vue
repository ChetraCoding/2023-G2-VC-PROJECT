<template>
  <v-layout>
    <!-- Slide bar -->
    <side-bar />

    <header-component title="Products" />

    <!-- Main -->
    <v-main style="height: auto">
      <!-- Main top -->
      <v-card class="px-2 py-4 d-flex justify-space-between">
        <v-icon
          icon="mdi-plus"
          size="40"
          class="rounded-lg"
          color="orange-darken-4"
          @click="dialog = true"
        >
        </v-icon>
        <v-spacer></v-spacer>
        <v-text-field
          density="compact"
          label="Search"
          append-inner-icon="mdi-magnify"
        ></v-text-field>
      </v-card>

      <!-- List products -->
      <product-list-table :products="products" />
    </v-main>
  </v-layout>

  <!-- Form create product -->
  <v-form>
    <v-dialog v-model="dialog" width="800">
      <v-card class="rounded-3">
        <v-card-title class="bg-orange-darken-4 text-center"
          >Add Product</v-card-title
        >
        <!-- Card-left -->
        <v-container class="w-100 d-flex">
          <div class="mr-3" style="width: 30%">
            <!-- Input field -->
            <v-text-field
              v-model="product.name"
              required
              class="mb-3"
              density="compact"
              label="Name"
              clearable
              :error-messages="vp$.name.$errors.map((e) => e.$message)"
              @input="vp$.name.$touch"
              @blur="vp$.name.$touch"
            ></v-text-field>
            <!-- Input field -->
            <v-text-field
              v-model="product.barcode"
              required
              class="mb-3"
              density="compact"
              label="Barcode"
              clearable
              :error-messages="vp$.barcode.$errors.map((e) => e.$message)"
              @input="vp$.barcode.$touch"
              @blur="vp$.barcode.$touch"
            ></v-text-field>

            <!-- Select field -->
            <v-select
              v-model="product.category_id"
              required
              class="mb-3"
              label="Category"
              :items="categories"
              :item-title="'name'"
              :item-value="'id'"
              density="compact"
              clearable
              :error-messages="vp$.category_id.$errors.map((e) => e.$message)"
              @change="vp$.category_id.$touch"
              @blur="vp$.category_id.$touch"
            >
            </v-select>

            <!--Textarea -->
            <v-textarea
              v-model="product.description"
              required
              class="mb-3"
              cols="2"
              density="compact"
              label="Description"
              clearable
              rows="1"
              :error-messages="vp$.description.$errors.map((e) => e.$message)"
              @input="vp$.description.$touch"
              @blur="vp$.description.$touch"
            ></v-textarea>

            <!-- Switch -->
            <v-switch
              v-model="product.is_active"
              required
              color="orange-darken-4"
              label="Active"
              hide-details="auto"
              :error-messages="vp$.is_active.$errors.map((e) => e.$message)"
              @change="vp$.is_active.$touch"
              @blur="vp$.is_active.$touch"
            ></v-switch>
          </div>

          <!--Card-center-->
          <div class="mr-3" style="width: 50%">
            <div class="d-flex align-center">
              <!--Input field-->
              <v-text-field
                v-model="customize.size"
                density="compact"
                label="Size"
                class="w-50"
                clearable
                :error-messages="vc$.size.$errors.map((e) => e.$message)"
                @input="vc$.size.$touch"
                @blur="vc$.size.$touch"
              ></v-text-field>

              <!--Input field-->
              <v-text-field
                v-model="customize.price"
                density="compact"
                label="Price"
                type="number"
                class="w-50"
                :error-messages="vc$.price.$errors.map((e) => e.$message)"
                @input="vc$.price.$touch"
                @blur="vc$.price.$touch"
              ></v-text-field>

              <!-- Icon -->
              <v-icon
                @click="
                  vc$.$validate();
                  addCustom(findCustIndex);
                "
                icon="mdi-plus"
                color="white"
                size="30"
                class="ml-2 mb-3 justify-center bg-orange-darken-4 rounded-pill"
              >
              </v-icon>
            </div>
            <!-- Card -->
            <div class="mt-3">
              <div
                v-for="(customize, index) in customizes"
                :key="index"
                class="d-flex justify-space-between border-1 pa-2 mb-2"
                style="border-bottom: 1px solid black"
                width="300px"
              >
                <div>
                  <span>{{ customize.size }}</span>
                </div>
                <div>
                  <span>${{ customize.price }}</span>
                </div>
                <div>
                  <v-icon
                    @click="editCustom(index)"
                    icon="mdi-square-edit-outline"
                    color="blue"
                    size="23"
                    class="mr-1 justify-center"
                  >
                  </v-icon>
                  <v-icon
                    @click="deleteCustom(index)"
                    icon="mdi-delete"
                    color="red"
                    size="23"
                    class="justify-center"
                  >
                  </v-icon>
                </div>
              </div>
            </div>
            <!--------->
          </div>
          <!----------->

          <!-- Card-right -->
          <div style="width: 30%">
            <v-file-input
              v-model="product.image"
              required
              density="compact"
              label="File input"
              prepend-icon="mdi-file-image"
              :error-messages="vp$.image.$errors.map((e) => e.$message)"
              @change="
                vp$.image.$touch;
                imageUpload($event);
              "
              @blur="vp$.image.$touch"
            ></v-file-input>
            <v-img
              :width="238"
              :height="175"
              class="rounded-lg mb-3"
              aspect-ratio="16/9"
              cover
              v-if="image.imageUrl"
              :src="image.imageUrl"
            ></v-img>
          </div>

          <!------------>
        </v-container>

        <!-- Action -->
        <v-card-actions class="bg-grey-lighten-2">
          <v-spacer></v-spacer>
          <danger-button
            @click="
              clearPruduct();
              dialog = false;
            "
            >Close</danger-button
          >
          <primary-button
            @click="
              vp$.$validate();
              addProduct();
            "
            >Save</primary-button
          >
        </v-card-actions>
        <!--------->
      </v-card>
    </v-dialog>
  </v-form>
</template>

<script setup>
// Import
import { onMounted, reactive, ref } from "vue";
import { useProductStore } from "@/stores/product";
import { useCategoryStore } from "@/stores/category";
import { storeToRefs } from "pinia";
import { useVuelidate } from "@vuelidate/core";
import { required } from "@vuelidate/validators";

// Variables
const { getProducts } = useProductStore();
const { products } = storeToRefs(useProductStore());
const { getCategory } = useCategoryStore();
const { categories } = storeToRefs(useCategoryStore());
const dialog = ref(true);

// Form: https://vuetifyjs.com/en/components/forms/
// Validation Product
const initialProduct = {
  name: 'Noodel',
  barcode: '007',
  category_id: 2,
  description: 'hello world',
  is_active: false,
  image: null,
};
const product = reactive({
  ...initialProduct,
});
const vp$ = useVuelidate(
  {
    name: { required },
    barcode: { required },
    category_id: { required },
    description: { required },
    is_active: { required },
    image: { required },
  },
  product
);
const clearPruduct = () => {
  vp$.value.$reset();
  for (const [key, value] of Object.entries(initialProduct)) {
    product[key] = value;
  }
};

// Validation Customize
const findCustIndex = ref(null);
const initialCustomize = {
  size: null,
  price: null,
};
const customize = reactive({
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
    customize[key] = value;
  }
};

const image = ref({
  image: null,
  imageUrl: null,
});

// Method
const imageUpload = (e) => {
  const file = e.target.files[0];
  console.log(file);
  image.value.image = file;
  image.value.imageUrl = URL.createObjectURL(file);
};

// Add customizes
const customizes = ref([]);
const addCustom = (custIndex) => {
  if (vc$.value.$errors.length === 0) {
    if (custIndex !== null) {
      customizes.value[custIndex].size = customize.size;
      customizes.value[custIndex].price = customize.price;
    } else {
      customizes.value.push({ ...customize });
    }
    findCustIndex.value = null;
    clearCustomize();
  }
};
const deleteCustom = (index) => {
  customizes.value.splice(index, 1);
};
const editCustom = (index) => {
  findCustIndex.value = index;
  customize.size = customizes.value[index].size;
  customize.price = customizes.value[index].price;
};

// const imageConverter = (file) => {
//   let reader = new FileReader();
//   let imageURL = '';
//   reader.onloadend = () => {
//      imageURL = reader.result;
//      console.log(reader.result);
//   }
//   reader.readAsDataURL(file);
//   return imageURL;
// }

const addProduct = async () => {
  // product.image = 'dsad';
  console.log(initialProduct);

  // vc$.value.price.$errors[0].$message = "Product";
  // if (customizes.value.length === 0) return vc$.value.$touch();

  // if (vp$.value.$errors.length === 0) {
  //   product.product_customizes = customizes.value;
  //   await storeProduct(product);
  //   dialog.value = false;
  //   clearPruduct();
  //   clearCustomize();
  // }
};

// Lifecycle hook
onMounted(() => {
  getProducts();
  getCategory();
});
</script>