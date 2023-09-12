<script setup>
import Property from "@/Pages/Index/Components/Property.vue";

defineProps({
    properties: Object,
});
</script>

<template>
    {{ properties.data }}
    <div>
        <h1 class="py-8 md:py-12 lg:py-20 text-center text-xl md:text-3xl lg:text-5xl">Agence Immobilière Briar</h1>
        <p class="text-center sm:text-sm md:text-md lg:text-lg lg:px-40">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta
            adipisci rerum minima dolor pariatur veritatis modi exercitationem
            vel repudiandae unde voluptate, at quos nihil voluptatem aliquam
            quam, dolores soluta voluptatibus cum repellendus? Veniam, ut. Sunt
            in veritatis perferendis velit, blanditiis eligendi ipsum libero
            repellendus rerum consequatur soluta nobis iure atque!
        </p>
    </div>
    <div>
        <h2 class="py-8 sm:py-12 lg:py-20 text-center text-md md:text-xl lg:text-3xl">Nos derniers biens</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
            <Property
                v-for="property in properties"
                :key="property.id"
                :property="property"
            />
        </div>
    </div>
</template>
