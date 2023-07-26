<template>
  <v-layout>
    <!-- Left side bar -->
    <res-owner-side-bar></res-owner-side-bar>

    <v-main class="ml-2">
      <!-- Header top -->
      <header-component title="Product report"></header-component>

      <!-- Main container -->
      <main class="d-flex mt-2">
        <div class="w-100 d-flex flex-column">
          <!-- Select date -->
          <div class="w-50 text-white">
            <v-text-field
              type="month"
              label="Select"
              @change="select"
            ></v-text-field>
          </div>

          <product-chart></product-chart>
        </div>

        <!--Products summary -->
        <summary-component class="mt-2" title="Product Summary">
          <template v-slot:content>
            <div
              class="bg-grey-darken-2 mt-2 rounded-lg d-flex justify-space-between align-center"
            >
              <div class="w-50 card-summary py-2 m-2 rounded-lg text-center">
                Pizza
              </div>
              <span class="mr-2">1000 Items</span>
            </div>
            <div
              class="bg-grey-darken-2 mt-2 rounded-lg d-flex justify-space-between align-center"
            >
              <div class="w-50 card-summary py-2 m-2 rounded-lg text-center">
                Humburger
              </div>
              <span class="mr-2">1300 Items</span>
            </div>
            <div
              class="bg-grey-darken-2 mt-4 py-3 rounded-lg d-flex justify-space-between align-center"
            >
              <span class="ml-2">Total</span>
              <span class="mr-2">2300 items</span>
            </div>
          </template>
        </summary-component>
      </main>
    </v-main>
  </v-layout>
</template>
<script setup>

const select = (event) => {
  const selectedValue = event.target.value;
  console.log(`${selectedValue}`);
};
</script>