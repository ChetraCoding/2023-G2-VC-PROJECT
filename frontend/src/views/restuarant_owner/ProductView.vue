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
  <div>
    <v-dialog v-model="dialog" width="1000">
      <v-card class="rounded-3">
        <v-card-title class="bg-orange-darken-4 text-center"
          >Add Product</v-card-title
        >
        <!-- Card-left -->
        <v-container class="w-100 d-flex">
          <div class="mr-3" style="width: 30%">
            <!-- Input field -->
            <v-text-field
              class="mb-3"
              density="compact"
              label="Name"
              :rules="numberRule"
              clearable             
            ></v-text-field>
            <!-- Input field -->
            <v-text-field
              class="mb-3"
              density="compact"
              label="Barcode"
              clearable
              :rules="numberRule"              
            ></v-text-field>

            <!-- Select field -->
            <v-select
              class="mb-3"
              label="Category"
              :rules="numberRule"
              :items="['Apple', 'orange', 'Mango', 'Banana']"
              density="compact"             
              clearable
            >
            </v-select>

            <!--Textarea -->
            <v-textarea
              class="mb-3"
              cols="2"
              density="compact"
              :rules="numberRule"
              label="Description"             
              clearable
              rows="1"
            ></v-textarea>

            <!-- Switch -->
            <v-switch color="orange-darken-4" label="Active"></v-switch>
          </div>

          <!--Card-center-->
          <div class="mr-3" style="width: 50%">
            <div class="d-flex align-center">
              <!--Input field-->
              <v-text-field
                density="compact"
                label="Size"
                :rules="numberRule"               
                clearable
              ></v-text-field>

              <!--Input field-->
              <v-text-field
                density="compact"
                label="Price"
                :rules="numberRule"                
                clearable
              ></v-text-field>

              <!-- Icon -->
              <v-icon
                icon="mdi-plus"
                color="white"
                size="30"
                class="ml-2 justify-center bg-orange-darken-4 rounded-pill"
              >
              </v-icon>
            </div>
            <!-- Card -->
            <div class="mt-3">
              <v-card class="d-flex border-1 pa-3 justify-space-between">
                <span class="ml-4 mr-15 pr-15">Small</span>
                <span class="mr-15 pr-15">3</span>
                <div>
                  <v-icon
                    icon="mdi-square-edit-outline"
                    color="blue"
                    size="23"
                    class="mr-3 justify-center"
                  >
                  </v-icon>
                  <v-icon
                    icon="mdi-delete"
                    color="red"
                    size="23"
                    class="justify-center"
                  >
                  </v-icon>
                </div>
              </v-card>
            </div>
            <!--------->
          </div>
          <!----------->

          <!-- Card-right -->
          <div style="width: 20%">
            <v-img
              :width="238"
              :height="175"
              class="rounded-lg mb-3"
              aspect-ratio="16/9"
              cover
              v-if="item.imageUrl"
              :src="item.imageUrl"
            ></v-img>
            <v-file-input
              density="compact"
              label="File input"
              :rules="numberRule"
              prepend-icon="mdi-file-image"
              @change="onChange"
            ></v-file-input>
          </div>

          <!------------>
        </v-container>

        <!-- Action -->
        <v-card-actions class="bg-grey-lighten-2">
          <v-spacer></v-spacer>
          <v-btn
            color="bg-danger text-white"
            variant="text"
            @click="dialog = false"
          >
            Close
          </v-btn>
          <v-btn
            class="bg-orange-darken-4"
            variant="text"
            @click="dialog = false"
          >
            Save
          </v-btn>
        </v-card-actions>
        <!--------->
      </v-card>
    </v-dialog>
  </div>
</template>

<script setup>
import { ref } from "vue";

// Variables
const dialog = ref(true);

const numberRule = ref([
  (v) => !!v || "Field is required",
]);

const item = ref({
  image: null,
  imageUrl: null,
});

const onChange = (e) => {
  const file = e.target.files[0];
  item.value.image = file;
  item.value.imageUrl = URL.createObjectURL(file);
};

let products = ref([
  {
    name: "Frozen Yogurt",
    calories: 159,
  },
  {
    name: "Ice cream sandwich",
    calories: 237,
  },
]);
</script>