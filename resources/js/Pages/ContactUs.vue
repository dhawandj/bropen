<template>
    <div class="min-h-screen flex flex-col">
      <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <Link :href="route('dashboard')" class="text-2xl font-bold">browriters.com </Link>
        <nav>
          <ul class="hidden md:flex space-x-6">
            <li><Link href="dashboard" class="hover:text-green-500">Home</Link></li>
            <li><Link href="/contact-us" class="hover:text-green-500">Contact</Link></li>
            <li><Link href="/about" class="hover:text-green-500">About</Link></li>
          </ul>
        </nav>
        <button class="md:hidden text-xl" @click="toggleMenu">☰</button>
      </header>
  
      <!-- Mobile Menu -->
      <div v-if="menuOpen" class="md:hidden bg-white shadow-md py-4 px-6 flex flex-col space-y-4">
        <Link href="/" class="hover:text-green-500" @click="toggleMenu">Home</Link>
        <Link href="/contact-us" class="hover:text-green-500" @click="toggleMenu">Contact</Link>
        <Link href="/about" class="hover:text-green-500" @click="toggleMenu">About</Link>
      </div>
  
      <!-- Contact Section -->
      <section class="py-12 px-4 md:px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-center">Get in Touch</h2>
        <p class="text-gray-700 text-center mt-4">
          Have questions? Want to learn more about our eco-friendly pens? Reach out to us!
        </p>
  
        <div class="mt-8 max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
          <form @submit.prevent="submitForm">
            <div class="mb-4">
              <label class="block text-gray-700 font-medium">Name</label>
              <input v-model="form.name" type="text" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Your Name">
            </div>
            
            <div class="mb-4">
              <label class="block text-gray-700 font-medium">Email</label>
              <input v-model="form.email" type="email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Your Email">
            </div>
  
            <div class="mb-4">
              <label class="block text-gray-700 font-medium">Message</label>
              <textarea v-model="form.message" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" rows="4" placeholder="Your Message"></textarea>
            </div>
  
            <button type="submit" class="bg-green-500 text-white py-2 px-6 rounded-lg hover:bg-green-600 w-full">
              Send Message
            </button>
          </form>
        </div>
      </section>
  
      <!-- Contact Info -->
      <section class="bg-green-50 py-12 px-4 text-center">
        <h3 class="text-2xl font-semibold">Our Contact Details</h3>
        <p class="mt-2 text-gray-700">📍 123 Green Street, Bangalore, India</p>
        <p class="mt-2 text-gray-700">📧 support@browriters.com</p>
        <p class="mt-2 text-gray-700">📞 +91 8050859436</p>
      </section>
  
      <!-- Google Maps (Optional) -->
      <section class="py-6 px-4">
        <iframe class="w-full h-64 rounded-lg shadow-md"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3871.8951746020853!2d77.5945665153324!3d12.97159859089695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTLCsDU4JzE4LjAiTiA3N8KwMzUnMzYuNSJF!5e0!3m2!1sen!2sin!4v1614065747632!5m2!1sen!2sin"
          allowfullscreen="" loading="lazy">
        </iframe>
      </section>
  
      <!-- Footer -->
      <footer class="bg-gray-900 text-white py-6 text-center px-4">
        <p>&copy; 2025 browriters.com . All rights reserved.</p>
      </footer>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
  
  const menuOpen = ref(false);
  const toggleMenu = () => {
    menuOpen.value = !menuOpen.value;
  };
  
  // Contact form state
  const form = ref({
    name: '',
    email: '',
    message: ''
  });
  
  // Form submission (placeholder)
  const submitForm = () => {
    alert(`Thank you, ${form.value.name}! Your message has been sent.`);
    // Here, you would send form data to a backend (e.g., Laravel API)
    form.value = { name: '', email: '', message: '' }; // Reset form after submission
  };
  </script>
  
  <style scoped>
  button {
    transition: background 0.3s ease;
  }
  </style>
  