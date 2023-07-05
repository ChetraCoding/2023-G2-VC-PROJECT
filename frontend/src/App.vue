<template>
  <router-view/>
  <category-view></category-view>
</template>

<script>

  import CategoryView from "./views/CategoryView.vue"
export default{
  components:{CategoryView,}
}

</script>

<style>

</style>
