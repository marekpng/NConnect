<template>
  <div>
    <Navbar />
    <CustomSite />
    <FooterComponent />
  </div>
</template>

<script>
import CustomSite from '@/components/CustomSite.vue';
import FooterComponent from '@/components/FooterComponent.vue';
import Navbar from "@/components/Navbar.vue";


export default {
  name: 'CustomSiteView',
  components: {
    CustomSite,
    FooterComponent,
    Navbar
  },
};
</script>
