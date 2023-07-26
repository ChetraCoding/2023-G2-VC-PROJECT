<template>
  <v-row justify="center" class="bg-info mt-3">
    <v-date-picker v-model="picker" type="month"> w ! m ?</v-date-picker>
  </v-row>
</template>

<script>
export default {
  data() {
    return {
      picker: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
        .toISOString()
        .substr(0, 10),
    };
  },
};
</script>
