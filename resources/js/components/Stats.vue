<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div>
        <h2 style="direction: rtl" class="text-gray-500 text-xs font-medium uppercase tracking-wide">معطيات حول منصة</h2>
        <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-3 lg:grid-cols-3">
            <li v-for="project in projects" :key="project.name" class="col-span-1 flex shadow-sm rounded-md">
                <div :class="[project.bgColor, 'flex-shrink-0 flex items-center justify-center w-16 text-white text-sm font-medium rounded-l-md']">
                    {{ project.initials }}
                </div>
                <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                    <div class="flex-1 px-4 py-2 text-sm truncate">
                        <a :href="project.href" class="text-gray-900 font-medium hover:text-gray-600">{{ project.name }}</a>
                        <p class="text-gray-500">{{ project.members }}</p>
                    </div>
                    <div class="flex-shrink-0 pr-2">
                        <button type="button" class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Open options</span>
                            <DotsVerticalIcon class="w-5 h-5" aria-hidden="true" />
                        </button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
import { DotsVerticalIcon } from '@heroicons/vue/solid'

const projects = [
    { name: 'المستخدمين', initials: 'TU', href: '#', members: 16, bgColor: 'bg-pink-600' },
    { name: 'أنواع المشاكل', initials: 'Cat', href: '#', members: 3, bgColor: 'bg-yellow-500' },
    { name: 'تبليغات', initials: 'Re', href: '#', members: 8, bgColor: 'bg-green-500' },
]

export default {
    name:'Stat',
    components: {
        DotsVerticalIcon,
    },
    setup() {
        return {
            projects,
        }
    },
}
</script>
