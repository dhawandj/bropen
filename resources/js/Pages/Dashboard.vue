<template>
  <div class="min-h-screen flex flex-col">
    <!-- Navbar -->
    <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <Link :href="route('dashboard')" class="text-2xl font-bold"><span class="text-green-500 font-semibold">bro</span>writers.com</Link>

        <nav>
          <ul class="hidden md:flex space-x-6">
            <li><Link :href="route('dashboard')" class="hover:text-green-500">Home</Link></li>
            <li><Link href="/contact-us/" class="hover:text-green-500">Contact</Link></li>
            <li><Link href="/about" class="hover:text-green-500">About</Link></li>
            <li v-if="!$page.props.auth.user"><Link :href="route('login')" class="hover:text-green-500">Login</Link></li>
            <li v-if="$page.props.auth.user"><Link method="post" as="button" :href="route('logout')" class="hover:text-green-500">Logout</Link></li>
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

    <!-- Hero Section -->
    <section class="text-center py-16 bg-green-100 px-4">
      <h2 class="text-3xl md:text-4xl font-bold">Sustainable Pens for a Better Future</h2>
      <p class="text-md md:text-lg text-gray-700 mt-4">
        Our pens are crafted from recycled paper and sustainably sourced wood. 
        Write with purpose, knowing you're helping the planet.
      </p>
      <button onclick="document.getElementById('products').scrollIntoView({behavior: 'smooth'});" class="mt-6 bg-green-500 text-white py-2 px-6 rounded-lg hover:bg-green-600">
        Explore Eco Pens
      </button>
    </section>

    <!-- Product Showcase -->
    <section id="products" class="py-12 px-4 md:px-6">
      <h3 class="text-2xl md:text-3xl font-semibold text-center">Our Eco-Friendly Collection</h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8">
        <div v-for="product in products" :key="product.id" class="border p-4 rounded-lg shadow">
          <img :src="product.image" :alt="product.name" class="w-full h-40 md:h-48 object-cover rounded-md" />
          <h4 class="mt-4 text-lg md:text-xl font-semibold">{{ product.name }}</h4>
          <p class="text-gray-600">{{ product.description }}</p>
          <p class="mt-2 text-lg font-bold">₹{{ product.price }}</p>
          <Link :href="route('checkout')" class="mt-4 inline-block bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">
            Order Now
          </Link>
        </div>
      </div>
    </section>

    <!-- Why Eco Pens -->
    <section id="eco-benefits" class="bg-green-50 py-12 px-4 text-center">
      <h3 class="text-2xl md:text-3xl font-semibold">Why Choose Eco Pens?</h3>
      <p class="mt-4 text-gray-700">
        Our pens are made from biodegradable paper and wood, reducing plastic waste.
        Sustainable, stylish, and smooth writing for a greener planet.
      </p>
    </section>

    <!-- Testimonials -->
    <section class="bg-gray-100 py-12 px-4 text-center">
      <h3 class="text-2xl md:text-3xl font-semibold">What Our Customers Say</h3>
      <div class="mt-6">
        <p class="italic text-gray-700">"These eco pens feel amazing! Love the sustainability factor."</p>
        <p class="mt-2 font-semibold">- Ganesh Writer</p>
      </div>
    </section>

    <!-- Footer with Legal Links -->
    <footer class="bg-gray-900 text-white py-8 text-center px-4">
      <div class="container mx-auto">
        <p class="mb-4">&copy; 2025 browriters.com . All rights reserved.</p>
        
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
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const menuOpen = ref(false);
const toggleMenu = () => {
  menuOpen.value = !menuOpen.value;
};

const products = ref([
  { id: 1, name: 'Standard Writer Pen', description: 'Recycled paper barrel, wooden tip.', price: 99, image: '/storage/pen1.jpg' },
  { id: 2, name: 'Custom named Pen', description: 'Name will be printed on, Pen barrel.', price: 150, image: '/storage/pen2.jpg' },
  { id: 3, name: 'browriters Pen', description: '100% biodegradable, made from paper. browriters.com.com Name on pen', price: 99, image: '/storage/pen3.jpg' },
]); 
</script>

<style scoped>
button {
  transition: background 0.3s ease;
}
</style>
