<!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/typography'),
    ],
  }
  ```
-->
<template>
    <div class="bg-white h-fit">
        <div class="pt-6 pb-16 sm:pb-24">
            <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
               <h1>Preview the issue</h1>
            </nav>
            <div style="height: 90vh" class="mt-8 max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 py-8">
                <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8 py-1 ">
                    <!-- Image gallery -->
                    <div class="my-8 lg:mt-0 lg:col-start-1 lg:col-span-7 lg:row-start-1 lg:row-span-3">
                        <div id="map" style="width: 100%;height: 70%"></div>
                    </div>

                    <div class="mt-2 lg:col-span-5">


                        <!-- Product details -->
                        <div class="mt-10">
                            <h2 class="text-sm font-medium text-gray-900">Description</h2>

                            <div class="mt-4 prose prose-sm text-gray-500" v-html="product.description" />
                        </div>

                        <div class="mt-8 border-t border-gray-200 pt-8">
                            <h2 class="text-sm font-medium text-gray-900">Fabric &amp; Care</h2>

                            <div class="mt-4 prose prose-sm text-gray-500">
                                <ul role="list">
                                    <li v-for="item in product.details" :key="item">{{ item }}</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Policies -->
                        <section aria-labelledby="policies-heading" class="mt-10">
                            <h2 id="policies-heading" class="sr-only">Our Policies</h2>

                            <dl class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
                                <div v-for="policy in policies" :key="policy.name" class="bg-gray-50 border border-gray-200 rounded-lg p-6 text-center">
                                    <dt>
                                        <component :is="policy.icon" class="mx-auto h-6 w-6 flex-shrink-0 text-gray-400" aria-hidden="true" />
                                        <span class="mt-4 text-sm font-medium text-gray-900">
                      {{ policy.name }}
                    </span>
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-500">
                                        {{ policy.description }}
                                    </dd>
                                </div>
                            </dl>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue'
import { StarIcon } from '@heroicons/vue/solid'
import { RadioGroup, RadioGroupLabel, RadioGroupOption } from '@headlessui/vue'
import { CurrencyDollarIcon, GlobeIcon } from '@heroicons/vue/outline'
import { GoogleMap , Marker , MarkerCluster } from "vue3-google-map";


const product = {
    name: 'Basic Tee',
    price: '$35',
    rating: 3.9,
    reviewCount: 512,
    href: '#',
    breadcrumbs: [
        { id: 1, name: 'Women', href: '#' },
        { id: 2, name: 'Clothing', href: '#' },
    ],
    images: [
        {
            id: 1,
            imageSrc: 'https://tailwindui.com/img/ecommerce-images/product-page-01-featured-product-shot.jpg',
            imageAlt: "Back of women's Basic Tee in black.",
            primary: true,
        },
        {
            id: 2,
            imageSrc: 'https://tailwindui.com/img/ecommerce-images/product-page-01-product-shot-01.jpg',
            imageAlt: "Side profile of women's Basic Tee in black.",
            primary: false,
        },
        {
            id: 3,
            imageSrc: 'https://tailwindui.com/img/ecommerce-images/product-page-01-product-shot-02.jpg',
            imageAlt: "Front of women's Basic Tee in black.",
            primary: false,
        },
    ],
    colors: [
        { name: 'Black', bgColor: 'bg-gray-900', selectedColor: 'ring-gray-900' },
        { name: 'Heather Grey', bgColor: 'bg-gray-400', selectedColor: 'ring-gray-400' },
    ],
    sizes: [
        { name: 'XXS', inStock: true },
        { name: 'XS', inStock: true },
        { name: 'S', inStock: true },
        { name: 'M', inStock: true },
        { name: 'L', inStock: true },
        { name: 'XL', inStock: false },
    ],
    description: `
    <p>The Basic tee is an honest new take on a classic. The tee uses super soft, pre-shrunk cotton for true comfort and a dependable fit. They are hand cut and sewn locally, with a special dye technique that gives each tee it's own look.</p>
    <p>Looking to stock your closet? The Basic tee also comes in a 3-pack or 5-pack at a bundle discount.</p>
  `,
    details: [
        'Only the best materials',
        'Ethically and locally made',
        'Pre-washed and pre-shrunk',
        'Machine wash cold with similar colors',
    ],
}
const policies = [
    { name: 'International delivery', icon: GlobeIcon, description: 'Get your order in 2 years' },
    { name: 'Loyalty rewards', icon: CurrencyDollarIcon, description: "Don't look at other tees" },
]

export default {
    name:'Preview',
    props: ['lat' , 'lng'],
    components: {
        RadioGroup,
        RadioGroupLabel,
        RadioGroupOption,
        StarIcon,
        GoogleMap,
        Marker,
        MarkerCluster,
    },
    setup() {
        const selectedColor = ref(product.colors[0])
        const selectedSize = ref(product.sizes[2])
        const center = { lat:31.56717001089404, lng:-7.653935889683484 };
        const labelPlace = ref({ })
        const currentPlace = ref({ position: center, label: "L", title: "LADY LIBERTY"  })

        return {
            product,
            policies,
            selectedColor,
            selectedSize,
            center,
            currentPlace,
        }
    },
    mounted() {
        //lat: 31.56395583978245, lng: -7.664375884360373
        console.log(this.lat , this.lng)
        console.log(window.initMap)
        initMap(this.lat, this.lng)
    }
}
</script>
