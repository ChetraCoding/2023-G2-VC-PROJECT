<template>
  <v-layout>
    <res-owner-side-bar></res-owner-side-bar>
    <!-- Left side bar -->
    <side-bar />

    <v-main class="ml-2">
      <!-- Header top -->
      <header-component title="Manage Money"> </header-component>
      <!-- Main container -->
      <main class="d-flex mt-2">
        <!-- <div class="w-75 d-flex flex-column"></div>  -->
        <div class="w-100 d-flex flex-column">
          <!-- Tab of month  -->
          <v-slide-group>
            <v-slide-group-item>
              <secondary-button class="ml-2 mt-2">2018</secondary-button>
              <secondary-button class="ml-2 mt-2">2019</secondary-button>
              <secondary-button class="ml-2 mt-2">2020</secondary-button>
              <secondary-button class="ml-2 mt-2">2021</secondary-button>
              <secondary-button class="ml-2 mt-2">2022</secondary-button>
              <secondary-button class="ml-2 mt-2">2023</secondary-button>
            </v-slide-group-item>
          </v-slide-group>
          <money-chart></money-chart>
        </div>
        <!--Money summary -->
        <summary-component class="mt-2" title="Money Summary">
          <template v-slot:content>
            <div
              class="bg-grey-darken-2 mt-2 rounded-lg d-flex justify-space-between align-center"
      
            >
            
              <div class="w-50 card-summary py-2 m-2 rounded-lg text-center">
                Original Pizza
              </div>
              <span class="mr-2">9000 $</span>
            </div>
            <div
              class="bg-grey-darken-2 mt-4 py-3 rounded-lg d-flex justify-space-between align-center"
            >
              <span class="ml-2">Total</span>
              <span class="mr-2">666 $</span>
            </div>
          </template>
        </summary-component>
      </main>
    </v-main>
  </v-layout>
</template>

<script >
</script>