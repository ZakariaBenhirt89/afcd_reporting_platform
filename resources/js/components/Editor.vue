<template>
    <div>
        <img alt="Vue logo" src="https://res.cloudinary.com/dy6vgsgr8/image/upload/v1653560174/ISATECH_1_egxaay.svg">
        <editor
            :init="{
        plugins: 'lists link image table code help wordcount'
      }"
        />
    </div>
</template>

<script>
import Editor from '@tinymce/tinymce-vue'

export default {
    name: 'editor',
    components: {
        'editor': Editor
    }
}
</script>
