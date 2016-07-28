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
    background-color: #f4645f;
    color: #fff;
    height: 15vh;
    line-height: 15vh;
    border-radius: 3px;
}
.term.checked {
    background-color: #ccc;
    text-transform: uppercase;
}
</style>
