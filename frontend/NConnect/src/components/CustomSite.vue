<template>
  <div v-html="content"></div>
</template>

<script>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';

export default {
  name: 'CustomSite',
  setup() {
    const route = useRoute();
    const content = ref('');

    const fetchSiteContent = async () => {
      const path = route.params.path;

      try {
        const response = await fetch(`http://127.0.0.1:8000/api/custom-sites/path/${path}`);

        if (response.ok) {
          const data = await response.json();
          const decodedMyFile = decodeURIComponent(escape(data.myFile));
          content.value = decodedMyFile;
        } else {
          console.error('Failed to load site content:', response.status, await response.text());
        }
      } catch (error) {
        console.error('Error loading site content:', error);
      }
    };

    onMounted(fetchSiteContent);

    return {
      content,
    };
  },
};
</script>

<style scoped>
/* Add any necessary styling here */
</style>
