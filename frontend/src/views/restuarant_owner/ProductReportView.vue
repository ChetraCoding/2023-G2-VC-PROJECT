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
          <!-- Tab of month  -->
          <v-slide-group>
            <v-slide-group-item>
              <secondary-button class="ml-2 mt-2">January</secondary-button>
              <secondary-button class="ml-2 mt-2">February</secondary-button>
              <secondary-button class="ml-2 mt-2">March</secondary-button>
              <secondary-button class="ml-2 mt-2">April</secondary-button>
              <secondary-button class="ml-2 mt-2">May</secondary-button>
              <secondary-button class="ml-2 mt-2">June</secondary-button>
            </v-slide-group-item>
          </v-slide-group>

          <product-chart></product-chart>
        </div>

        <!--Products summary -->
        <summary-component class="mt-2" title="Product Summary">
          <template v-slot:content>
            <div
              class="bg-grey-darken-2 mt-2 rounded-lg d-flex justify-space-between align-center"
            >
              <div class="w-50 card-summary py-2 m-2 rounded-lg text-center">
                Original Pizza
              </div>
              <span class="mr-2">9000 Items</span>
            </div>
            <div
              class="bg-grey-darken-2 mt-2 rounded-lg d-flex justify-space-between align-center"
            >
              <div class="w-50 card-summary py-2 m-2 rounded-lg text-center">
                Humburger
              </div>
              <span class="mr-2">8000 Items</span>
            </div>
            <div
              class="bg-grey-darken-2 mt-2 rounded-lg d-flex justify-space-between align-center"
            >
              <div class="w-50 card-summary py-2 m-2 rounded-lg text-center">
                Sandwich
              </div>
              <span class="mr-2">7000 Items</span>
            </div>
            <div
              class="bg-grey-darken-2 mt-2 rounded-lg d-flex justify-space-between align-center"
            >
              <div class="w-50 card-summary py-2 m-2 rounded-lg text-center">
                Coca
              </div>
              <span class="mr-2">5000 Items</span>
            </div>
            <div
              class="bg-grey-darken-2 mt-4 py-3 rounded-lg d-flex justify-space-between align-center"
            >
              <span class="ml-2">Total</span>
              <span class="mr-2">11111.1111 items</span>
            </div>
          </template>
        </summary-component>
      </main>
    </v-main>
  </v-layout>
</template>

<script></script>
