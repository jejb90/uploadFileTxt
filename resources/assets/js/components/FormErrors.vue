<template>
    <span class="help-block align-error">
        <slot></slot>
    </span>
</template>

<script>

    const props = {

    	errors:{
    		type: Object
      }
        
    }

    export default {

      props: props

    }

</script>

<style scoped>
    .align-error{
        margin-left:16px;
        color: #a94442;
    }
</style>

<!-- :class="error.color_id ? 'error': 'ok'"-->
<!-- styles
.error{
    border: 1px solid #a94442
}
.ok {
    border: 1px solid #bfcbd9
}-->
<!--:style="error.color_id ? {color: '#a94442'}:{color: '#bfcbd9'}"-->