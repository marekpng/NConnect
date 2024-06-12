<template>
  <div>
    <div class="editor-controls">
      <input v-model="siteName" placeholder="Enter site name" />
      <input v-model="sitePath" placeholder="Enter site path" />
      <select v-model="selectedSiteId" @change="loadContent">
        <option disabled value="">Select a site</option>
        <option v-for="site in sites" :key="site.id" :value="site.id">{{ site.name }}</option>
      </select>
    </div>
    <div ref="quillEditor" style="height: 400px;"></div>
    <div class="editor-actions">
      <button @click="saveContent">Save Content</button>
      <button @click="updateContent">Update Content</button>
      <button @click="deleteContent">Delete Content</button>
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';

export default {
  name: 'QuillEditor',
  setup() {
    const siteName = ref('');
    const sitePath = ref('');
    const selectedSiteId = ref('');
    const sites = ref([]);
    const quillEditor = ref(null);
    const quill = ref(null);

    const fetchSites = async () => {
      try {
        const response = await fetch('http://127.0.0.1:8000/api/custom-sites');
        if (response.ok) {
          const data = await response.json();
          sites.value = data;
          console.log('Sites fetched successfully:', sites.value); // Log fetched sites
        } else {
          const errorText = await response.text();
          console.error('Failed to fetch sites:', response.status, errorText);
        }
      } catch (error) {
        console.error('Error fetching sites:', error);
      }
    };

    onMounted(async () => {
      await fetchSites();

      // Load highlight.js CSS
      const hljsCss = document.createElement('link');
      hljsCss.rel = 'stylesheet';
      hljsCss.href = 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css';
      document.head.appendChild(hljsCss);

      // Load highlight.js
      const hljsScript = document.createElement('script');
      hljsScript.src = 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js';
      hljsScript.onload = () => {
        // Initialize highlight.js
        window.hljs = hljs;
        hljs.initHighlightingOnLoad();

        // Load Quill CSS
        const quillCss = document.createElement('link');
        quillCss.rel = 'stylesheet';
        quillCss.href = 'https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css';
        document.head.appendChild(quillCss);

        // Load Quill JS
        const quillScript = document.createElement('script');
        quillScript.src = 'https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js';
        quillScript.onload = () => {
          const options = {
            debug: 'info',
            modules: {
              syntax: true, // Include syntax module
              toolbar: [
                [{ header: [1, 2, false] }],
                ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                ['blockquote', 'code-block'], // blocks
                [{ list: 'ordered' }, { list: 'bullet' }],
                [{ script: 'sub' }, { script: 'super' }], // superscript/subscript
                [{ indent: '-1' }, { indent: '+1' }], // outdent/indent
                [{ direction: 'rtl' }], // text direction
                [{ size: ['small', false, 'large', 'huge'] }], // custom dropdown
                [{ header: 1 }, { header: 2 }],
                [{ color: [] }, { background: [] }], // dropdown with defaults from theme
                [{ font: [] }],
                [{ align: [] }],
                ['link', 'image', 'video'],
                ['clean'] // remove formatting button
              ],
            },
            placeholder: 'Hello, I am Quill',
            theme: 'snow'
          };
          quill.value = new Quill(quillEditor.value, options);
        };
        document.head.appendChild(quillScript);
      };
      document.head.appendChild(hljsScript);
    });

    const saveContent = async () => {
      const myFile = quill.value.root.innerHTML;
      const encodedMyFile = unescape(encodeURIComponent(myFile)); // Proper encoding
      console.log('Saving content:', myFile);

      // Send content to the backend
      try {
        const response = await fetch('http://127.0.0.1:8000/api/custom-sites', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ name: siteName.value, myFile: encodedMyFile, path: sitePath.value }),
        });

        if (response.ok) {
          alert('Content saved successfully');
          await fetchSites(); // Refresh the list of sites
        } else {
          const errorText = await response.text();
          alert('Failed to save content: ' + errorText);
        }
      } catch (error) {
        alert('Error saving content: ' + error.message);
      }
    };

    const updateContent = async () => {
      if (!selectedSiteId.value) {
        alert('Please select a site to update.');
        return;
      }

      const myFile = quill.value.root.innerHTML;
      const encodedMyFile = unescape(encodeURIComponent(myFile)); // Proper encoding
      console.log('Updating content:', myFile);

      // Send updated content to the backend
      try {
        const response = await fetch(`http://127.0.0.1:8000/api/custom-sites/${selectedSiteId.value}`, {
          method: 'PUT',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ name: siteName.value, myFile: encodedMyFile, path: sitePath.value }),
        });

        if (response.ok) {
          alert('Content updated successfully');
          await fetchSites(); // Refresh the list of sites
        } else {
          const errorText = await response.text();
          alert('Failed to update content: ' + errorText);
        }
      } catch (error) {
        alert('Error updating content: ' + error.message);
      }
    };

    const deleteContent = async () => {
      if (!selectedSiteId.value) {
        alert('Please select a site to delete.');
        return;
      }

      try {
        const response = await fetch(`http://127.0.0.1:8000/api/custom-sites/${selectedSiteId.value}`, {
          method: 'DELETE',
        });

        if (response.ok) {
          alert('Content deleted successfully');
          await fetchSites(); // Refresh the list of sites
          // Clear the editor and inputs
          quill.value.root.innerHTML = '';
          siteName.value = '';
          sitePath.value = '';
          selectedSiteId.value = '';
        } else {
          const errorText = await response.text();
          alert('Failed to delete content: ' + errorText);
        }
      } catch (error) {
        alert('Error deleting content: ' + error.message);
      }
    };

    const loadContent = async () => {
      if (!selectedSiteId.value) {
        alert('Please select a site to load.');
        return;
      }

      try {
        const response = await fetch(`http://127.0.0.1:8000/api/custom-sites/${selectedSiteId.value}`);
        if (response.ok) {
          const data = await response.json();
          const decodedMyFile = decodeURIComponent(escape(data.myFile));
          quill.value.root.innerHTML = decodedMyFile;
          siteName.value = data.name;
          sitePath.value = data.path;
          console.log('Content loaded successfully');
        } else {
          const errorText = await response.text();
          alert('Failed to load content: ' + errorText);
        }
      } catch (error) {
        alert('Error loading content: ' + error.message);
      }
    };

    return {
      siteName,
      sitePath,
      selectedSiteId,
      sites,
      quillEditor,
      saveContent,
      updateContent,
      deleteContent,
      loadContent,
    };
  },
};
</script>

<style>
.editor-controls {
  display: flex;
  flex-direction: column;
  gap: 10px;
  align-items: center;
}

.editor-controls input, .editor-controls select {
  width: 80%;
  max-width: 500px;
  padding: 10px;
  margin-bottom: 10px;
  font-size: 16px;
}

.editor-actions {
  display: flex;
  justify-content: center;
  gap: 10px;
}

.editor-actions button {
  padding: 10px 20px;
  font-size: 16px;
}
</style>
