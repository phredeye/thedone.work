<template>
  <div id="app">
    <vue-extend-layouts loading="loading" path="app/ui/layouts"/>
  </div>
</template>

<script>
import VueExtendLayouts from 'vue-extend-layout'
export default {
  name: 'App',
  components: { VueExtendLayouts }
}
</script>
