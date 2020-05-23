<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <VuePrismEditor v-model="code" language="html" lineNumbers></VuePrismEditor>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</template>
<script>
  import 'prismjs'
  import VuePrismEditor from 'vue-prism-editor'

  export default {
    components: { VuePrismEditor },

    data () {
      return {
        code: '',
      }
    },
  }
</script>
