<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Collapsible, CollapsibleContent, CollapsibleTrigger } from '@/components/ui/collapsible';

import { ListChecks } from 'lucide-vue-next';
import { ref } from 'vue';
import Navigation from './Navigation.vue';
const isOpen = ref(false);
const filterSelected = ref('');
</script>

<template>
    <Collapsible v-model:open="isOpen" class="w-full space-y-2">
        <div class="flex items-center justify-between space-x-4 px-4">
            <CollapsibleTrigger as-child>
                <Button variant="ghost" size="sm" class="flex w-full justify-between p-0">
                    <div class="flex items-center space-x-2">
                        <h4 class="text-sm font-semibold">Filters</h4>
                        <div v-if="filterSelected" class="bg-primary rounded-lg border px-2 py-1 text-xs font-thin text-white">
                            {{ filterSelected }}
                        </div>
                    </div>

                    <ListChecks class="h-4 w-4" />
                    <span class="sr-only">Toggle</span>
                </Button>
            </CollapsibleTrigger>
        </div>
        <CollapsibleContent class="space-y-2">
            <Navigation @filter-selected="(v) => (filterSelected = v)" />
        </CollapsibleContent>
    </Collapsible>
</template>
