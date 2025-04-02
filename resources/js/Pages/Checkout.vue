<template>
    <div class=" mb-5">
 <!-- Navbar -->
 <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <Link :href="route('dashboard')" class="text-2xl font-bold">browriters.com </Link>

        <nav>
          <ul class="hidden md:flex space-x-6">
            <li><Link :href="route('dashboard')" class="hover:text-green-500">Home</Link></li>
            <li><Link href="/contact-us/" class="hover:text-green-500">Contact</Link></li>
            <li><Link href="/about" class="hover:text-green-500">About</Link></li>
          </ul>
        </nav>
        <button class="md:hidden text-xl" @click="toggleMenu">☰</button>
      </header>
  
      <!-- Mobile Menu -->
      <div v-if="menuOpen" class="md:hidden bg-white shadow-md py-4 px-6 flex flex-col space-y-4">
        <Link href="/" class="hover:text-green-500" @click="toggleMenu">Home</Link>
        <Link href="/contact-us/" class="hover:text-green-500">Contact</Link>
        <Link href="/about" class="hover:text-green-500">About</Link>
      </div>
    </div>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-lg">
         <!-- Navbar -->
      <h2 class="text-2xl font-bold mb-4 text-center bg-green-100">Checkout</h2>
      
      <!-- Cart Summary -->
      <div class="mb-4">
        <h3 class="font-semibold text-lg">Your Cart</h3>
        <div v-for="item in cart" :key="item.id" class="flex justify-between items-center py-3 border-b">
          <div class="flex items-center gap-4">
            <img :src="item.image" alt="Pen" class="w-16 h-16 object-cover rounded" />
            <div>
              <p class="text-sm font-medium">{{ item.name }}</p>
              <p class="text-xs text-gray-500">₹{{ item.price }} each</p>
            </div>
          </div>
          <div class="flex items-center">
            <button @click="updateQty(item, -1)" class="px-3 py-1 border rounded bg-gray-200">-</button>
            <span class="mx-3">{{ item.qty }}</span>
            <button @click="updateQty(item, 1)" class="px-3 py-1 border rounded bg-gray-200">+</button>
          </div>
        </div>
      </div>
      
      <!-- Shipping Details -->
      <div class="mb-4">
        <h3 class="font-semibold text-lg">Shipping Details</h3>
        <input v-model="shipping.name" type="text" placeholder="Full Name" class="w-full p-3 border rounded mt-2" />
        <input v-model="shipping.address" type="text" placeholder="Address" class="w-full p-3 border rounded mt-2" />
        <input v-model="shipping.phone" type="text" placeholder="Phone Number" class="w-full p-3 border rounded mt-2" />
        <input v-model="shipping.penName" type="text" placeholder="Pen Name" class="w-full p-3 border rounded mt-2" />
      </div>
      
      <!-- Order Summary -->
      <div class="mb-4">
        <h3 class="font-semibold text-lg">Order Summary</h3>
        <p class="text-sm">Total Items: {{ totalItems }}</p>
        <p class="text-lg font-bold">Total: ₹{{ totalPrice }}</p>
      </div>
      
      <!-- Payment Buttons -->
      <div class="flex gap-2">
        <button @click="placeOrder" class="w-full bg-blue-500 text-white p-3 rounded">Pay with PhonePe</button>
        <button @click="placeOrder" class="w-full bg-green-500 text-white p-3 rounded">Pay with UPI</button>
      </div>
    </div>
    <footer class="bg-gray-900 text-white py-8 text-center px-4">
      <div class="container mx-auto">
        <p class="mb-4">&copy; 2025 browriters.com  All rights reserved.</p>
        
        <!-- Legal Links -->
        <div class="flex flex-wrap justify-center space-x-4 text-sm">
          <Link :href="route('pp')" class="hover:underline">Privacy Policy</Link>
          <Link :href="route('td')" class="hover:underline">Terms & Conditions</Link>
          <Link :href="route('rr')" class="hover:underline">Refund & Return Policy</Link>
          <Link :href="route('sd')" class="hover:underline">Shipping & Delivery Policy</Link>
          <Link :href="('faqs')" class="hover:underline">FAQs</Link>
          <Link :href="route('contact-us')" class="hover:underline">Contact</Link>
        </div>
      </div>
    </footer>
  </template>
  
  <script setup>
  import { Link } from "@inertiajs/vue3";
import { ref, computed } from "vue";
  
  const cart = ref([
    { id: 1, name: "Standard Pen", price: 99, qty: 0, image: "/storage/pen1.jpg" },
    { id: 2, name: "Custom named Pen", price: 150, qty: 1, image: "/storage/pen2.jpg" },
    { id: 2, name: "browriters.com Pen", price: 99, qty: 1, image: "/storage/pen4.jpg" },
  ]);
  
  const shipping = ref({ name: "", address: "", phone: "" ,penName:''});
  
  const totalItems = computed(() => cart.value.reduce((sum, item) => sum + item.qty, 0));
  const totalPrice = computed(() => cart.value.reduce((sum, item) => sum + item.qty * item.price, 0));
  
  const updateQty = (item, change) => {
    if (item.qty + change > 0) item.qty += change;
  };
  
  const placeOrder = () => {
    alert("Processing Payment...");
    // Send order details to Laravel API
  };
  </script>
  
  <style scoped>
  button:hover {
    opacity: 0.8;
  }
  </style>
  