<template>
    <div class="col-xs">
        <div class="term" :class="term.checked ? 'checked' : ''">
            {{ term.term }}
        </div>
    </div>
</template>

<script>

export default {
    props: ['term']
}
</script>

<style>
.term {
    border: 1px solid red;
}
.term.checked {
    border: 1px solid green;
}
</style>
