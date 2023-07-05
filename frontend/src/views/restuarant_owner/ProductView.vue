<template>
  <v-card>
    <v-layout>
      <v-navigation-drawer
        v-model="drawer"
        :rail="rail"
        color="black"
        permanent
        @click="rail = false"
      >
        <v-list-item
          class="text-orange-darken-4"
          prepend-icon="mdi-view-dashboard"
          title="Administration"
        >
          <template v-slot:append>
            <v-btn
              variant="text"
              icon="mdi-chevron-left"
              @click.stop="rail = !rail"
            ></v-btn>
          </template>
        </v-list-item>
        <v-divider></v-divider>
        <v-list density="compact" nav>
          <v-list-item
            prepend-icon="mdi-home"
            title="Dashboard"
            value="dashboard"
            class="text-orange-darken-4"
          >
          </v-list-item>
          <v-list-item
            prepend-icon="mdi-account"
            title="Categories"
            value="categories"
            class="text-orange-darken-4"
          >
          </v-list-item>
          <v-list-item
            prepend-icon="mdi-heart"
            title="Products"
            value="products"
            class="text-orange-darken-4"
          >
          </v-list-item>
          <v-list-item
            prepend-icon="mdi-table"
            title="Tables"
            value="tables"
            class="text-orange-darken-4"
          >
          </v-list-item>
          <v-list-item
            prepend-icon="mdi-domain"
            title="Reports"
            value="reports"
            class="text-orange-darken-4"
          >
          </v-list-item>
        </v-list>
      </v-navigation-drawer>
      <v-app-bar
        class="font-weight-bold text-orange-darken-4"
        title="Products"
      ></v-app-bar>

      <v-main style="height: auto">
        <v-card class="pa-3 mt-5 d-flex justify-space-between">
          <v-icon
            icon="mdi-plus"
            size="30"
            class="bg-orange rounded-lg"
            color="white"
          ></v-icon>
          <v-spacer></v-spacer>
          <input
            type="text"
            class="border border-5 pa-2 rounded-lg w-25"
            placeholder="Search"
          />
        </v-card>

        <v-table>
          <thead>
            <tr>
              <th class="text-left text-black font-weight-bold">Name</th>
              <th class="text-left text-black font-weight-bold">Calories</th>
              <th class="text-left text-black font-weight-bold">Description</th>
              <th class="text-left text-black font-weight-bold">Quantity</th>
              <th class="text-left text-black font-weight-bold">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in desserts" :key="item.name">
              <td>{{ item.name }}</td>
              <td>{{ item.calories }}</td>
              <td>{{ item.name }}</td>
              <td>{{ 30 }}</td>
              <td>
                <span class="mr-4 glyphicon text-info glyphicon-edit"></span>
                <span class="glyphicon text-danger glyphicon-trash"></span>
              </td>
            </tr>
          </tbody>
        </v-table>
      </v-main>
    </v-layout>
  </v-card>
</template>
<script>
export default {
  data() {
    return {
      drawer: true,
      rail: true,
      desserts: [
        {
          name: "Frozen Yogurt",
          calories: 159,
        },
        {
          name: "Ice cream sandwich",
          calories: 237,
        },
        {
          name: "Eclair",
          calories: 262,
        },
        {
          name: "Cupcake",
          calories: 305,
        },
        {
          name: "Gingerbread",
          calories: 356,
        },
        {
          name: "Jelly bean",
          calories: 375,
        },
        {
          name: "Lollipop",
          calories: 392,
        },
        {
          name: "Honeycomb",
          calories: 408,
        },
        {
          name: "Donut",
          calories: 452,
        },
        {
          name: "KitKat",
          calories: 518,
        },
        {
          name: "KitKat",
          calories: 518,
        },
        {
          name: "KitKat",
          calories: 518,
        },
        {
          name: "KitKat",
          calories: 518,
        },
      ],
    };
  },
};
</script>