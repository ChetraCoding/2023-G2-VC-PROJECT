<template>
    <nav-waiter-component @profile-clicked="drawer = !drawer"></nav-waiter-component>

    <v-select class="text-orange-darken-4" clearable label="Select table"
        :items="['01', '02', '03', '04', '05', '06']"></v-select>

    <header class="text-center text-orange-darken-4 text-h5 font-weight-bold">PRODUCTS</header>

    <v-container>
        <v-row>
            <v-col v-for="n in 10" :key="n" cols="12" sm="4">
                <v-card class="mx-auto" max-width="400">
                    <v-img class="align-end text-white" height="200"
                        src="https://saum.wownow.net/img/Cg76N2CUx0iAIdYBAAaINuoay-A314.png" cover>
                        <!-- <v-card-title>Top 10 Australian beaches</v-card-title> -->
                    </v-img>

                    <v-card-subtitle class="pt-4">
                        001
                    </v-card-subtitle>

                    <v-card-text>
                        <div>India Food</div>

                        <div>This is food decription.</div>
                    </v-card-text>

                    <v-card-actions>
                        <div class="text-orange-darken-4 font-weight-bold ">
                            $3
                        </div>
                        <v-spacer></v-spacer>

                        <v-btn class="bg-orange-darken-4 rounded-pill">
                            Customize
                        </v-btn>

                    </v-card-actions>
                </v-card>
            </v-col>
        </v-row>
    </v-container>


    <v-card class="overflow-visible">
        <v-layout>
            <v-navigation-drawer v-model="drawer" temporary location="right">
                <v-list-item prepend-avatar="https://randomuser.me/api/portraits/men/78.jpg" class="text-orange-darken-4"
                    title="Chetra Hong"></v-list-item>

                <v-divider></v-divider>

                <v-list density="compact" nav>
                    <v-list-item class="text-orange-darken-4" prepend-icon="mdi-view-dashboard" title="Home"
                        value="home"></v-list-item>
                    <v-list-item class="text-orange-darken-4" prepend-icon="mdi-forum" title="About"
                        value="about"></v-list-item>
                    <v-list-item @click="drawer = !drawer" class="text-orange-darken-4" prepend-icon="mdi-close"
                        title="Close"></v-list-item>
                </v-list>
                <v-spacer></v-spacer>
            </v-navigation-drawer>
        </v-layout>
    </v-card>

    <v-layout class="overflow-visible" style="height: 100px">
        <v-bottom-navigation class="mb-2 bg-black rounded-pill" horizontal>
            <!-- <v-btn>
                <v-icon>mdi-history</v-icon>

                Recents
            </v-btn>

            <v-btn>
                <v-icon>mdi-heart</v-icon>

                Favorites
            </v-btn> -->
            <h2>Total: $30</h2>

            <v-spacer></v-spacer>

            <v-btn class="text-h6 bg-orange-darken-4 rounded-pill">
                Order Now
            </v-btn>
        </v-bottom-navigation>
    </v-layout>
</template>
  
<script setup>
import { ref } from "vue";

const drawer = ref(null);

</script>