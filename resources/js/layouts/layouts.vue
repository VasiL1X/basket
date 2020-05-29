<template>
  <div class="main-layout">
        <child />
  </div>



</template>

<script>
  import Navbar from '~/components/Navbar'
  import Vfooter from '~/components/Vfooter'
  import LocaleDropdown from "../components/LocaleDropdown";

  export default {
    name: 'MainLayout',
    components: {
      LocaleDropdown,
      Navbar,
      Vfooter
    }
  }
</script>
