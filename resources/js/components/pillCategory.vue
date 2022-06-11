<template>
    <div>
        <router-link
            tag="li"
            :to="{
                name: 'tipologies.show',
                params: { slug: tipology.slug },
            }"
            class="cursor-pointer"
        >
            <h3 class="text-center px-3 py-1 pill-color rounded-pill">
                {{ tipology.name }}
            </h3>
        </router-link>
    </div>
</template>

<script>
export default {
    props: {
    tipology: {
        type: Object,
        require: true,
    },
},
};
</script>

<style lang="scss"></style>
