<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import { defineProps, ref } from 'vue';
import AlertNotification from '@/Components/AlertNotification.vue';

const props = defineProps({
  pages: Array,
  isAuthenticated: Boolean,
  flash: Object
});

const alert = ref({
  show: false,
  type: 'success',
  message: '',
  position: 'top-right',
  duration: 3000
});

const showAlert = (type, message) => {
  alert.value = {
    show: true,
    type: type,
    message: message,
    position: 'top-right',
    duration: 3000
  };
};

const closeAlert = () => {
  alert.value.show = false;
};

if (props.flash?.success) {
  showAlert('success', props.flash.success);
} else if (props.flash?.error) {
  showAlert('error', props.flash.error);
}
</script>
<template>

  <Head title="Imatge personal" />

  <MainLayout>
    <AlertNotification
      :show="alert.show"
      :type="alert.type"
      :message="alert.message"
      :position="alert.position"
      :duration="alert.duration"
      @close="closeAlert"
    />
    <div v-for="page in pages">
      <div class="pt-24 bg-gradient-to-r from-[#FFF1EA] to-white">
        <div class="max-w-6xl mx-auto px-4 py-12">
          <div class="flex flex-col md:flex-row items-center gap-8">
            <!-- Text Content -->
            <div class="w-full">
              <h1 class="text-4xl font-bold text-title">{{ page.title }}</h1>
              <div v-if=" page.subtitle != ''">
              <h2 class="text-2xl italic text-title mt-2">{{ page.subtitle }}</h2>
              </div>
              <p class="mt-4 text-gray-700/80">
                {{ page.description }}
              </p>
            </div>
          </div>
        </div>
      </div>
      <span v-html="page.content"></span>
    </div>
  </MainLayout>
</template>

<style scoped>
table {
  border-collapse: separate;
  border-spacing: 0;
}

th,
td {
  border: 1px solid #e5e7eb;
}

th:first-child {
  border-top-left-radius: 0.5rem;
}

th:last-child {
  border-top-right-radius: 0.5rem;
}

tr:last-child td:first-child {
  border-bottom-left-radius: 0.5rem;
}

tr:last-child td:last-child {
  border-bottom-right-radius: 0.5rem;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

/* Hover effect */
.rounded-2xl {
  transition: transform 0.3s ease-in-out;
}

.rounded-2xl:hover {
  transform: translateY(-5px);
}

.rounded-lg {
  transition: all 0.3s ease;
}

.rounded-lg:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}
</style>