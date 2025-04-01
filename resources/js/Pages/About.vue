<template>
    <div class="min-h-screen flex flex-col">
      <!-- Navbar -->
      <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <Link :href="route('dashboard')" class="text-2xl font-bold">Browriters Eco Pens</Link>
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
  
      <!-- About Us Section -->
      <section class="py-12 px-4 md:px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-bold">About Browriters Eco Pens</h2>
        <p class="text-gray-700 mt-4 max-w-3xl mx-auto">
          At **Browriters**, we believe in a **sustainable future**. Our pens are crafted from **recycled paper and responsibly sourced wood**, ensuring an **eco-friendly writing experience** without harming the environment.
        </p>
      </section>
  
      <!-- Why Choose Us -->
      <section class="bg-green-50 py-12 px-4">
        <h3 class="text-2xl font-semibold text-center">Why Choose Our Eco Pens?</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8 max-w-5xl mx-auto">
          <div class="p-6 bg-white rounded-lg shadow-md text-center">
            <h4 class="text-xl font-bold">🌱 Sustainable Materials</h4>
            <p class="mt-2 text-gray-600">Our pens are made from **biodegradable paper and wood**, reducing plastic waste.</p>
          </div>
          <div class="p-6 bg-white rounded-lg shadow-md text-center">
            <h4 class="text-xl font-bold">✍️ Smooth Writing</h4>
            <p class="mt-2 text-gray-600">Designed for **comfort and precision**, our pens offer a premium writing experience.</p>
          </div>
          <div class="p-6 bg-white rounded-lg shadow-md text-center">
            <h4 class="text-xl font-bold">♻️ Eco-Conscious Production</h4>
            <p class="mt-2 text-gray-600">We follow a **zero-waste policy** to ensure a greener planet for future generations.</p>
          </div>
        </div>
      </section>
  
      <!-- Our Story -->
      <section class="py-12 px-4 text-center">
        <h3 class="text-2xl font-semibold">Our Story</h3>
        <p class="mt-4 text-gray-700 max-w-3xl mx-auto">
          Browriters was founded with a vision to **reduce plastic waste** in stationery. Every year, **millions of plastic pens** end up in landfills, harming the planet. Our solution? **Eco-friendly pens** that deliver the same smooth writing experience **without polluting the environment**.
        </p>
      </section>
  
      <!-- Footer -->
     <footer class="bg-gray-900 text-white py-8 text-center px-4">
      <div class="container mx-auto">
        <p class="mb-4">&copy; 2025 Browriters Eco Pens. All rights reserved. </p>
        
        <!-- Legal Links -->
        <div class="flex flex-wrap justify-center space-x-4 text-sm">
          <Link :href="('privacy-policy')" class="hover:underline">Privacy Policy</Link>
          <Link :href="('terms-conditions')" class="hover:underline">Terms & Conditions</Link>
          <Link :href="('refund-policy')" class="hover:underline">Refund & Return Policy</Link>
          <Link :href="('shipping-policy')" class="hover:underline">Shipping & Delivery Policy</Link>
          <Link :href="('faqs')" class="hover:underline">FAQs</Link>
          <Link :href="('contact-us')" class="hover:underline">Contact</Link>
        </div>
      </div>
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
  </script>
  
  <style scoped>
  button {
    transition: background 0.3s ease;
  }
  </style>
  