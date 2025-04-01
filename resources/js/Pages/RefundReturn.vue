<template>
    <div class="min-h-screen flex flex-col items-center px-6 py-12">
      <h1 class="text-3xl font-bold mb-6">Refund & Return Policy</h1>
      <div class="max-w-3xl text-gray-700 space-y-6">
        <p>Effective Date: {{ new Date().getFullYear() }}</p>
  
        <h2 class="text-xl font-semibold">1. Eligibility for Returns</h2>
        <p>We accept returns for products that meet the following conditions:</p>
        <ul class="list-disc pl-6">
          <li>The item is unused and in its original packaging.</li>
          <li>A return request is initiated within 7 days of delivery.</li>
          <li>The product is defective, damaged, or incorrect.</li>
        </ul>
  
        <h2 class="text-xl font-semibold">2. Non-Returnable Items</h2>
        <ul class="list-disc pl-6">
          <li>Used or damaged products (not due to transit issues).</li>
          <li>Customized or personalized pens.</li>
          <li>Products returned after 7 days of delivery.</li>
        </ul>
  
        <h2 class="text-xl font-semibold">3. Return Process</h2>
        <ol class="list-decimal pl-6">
          <li>Contact our support team at <a href="mailto:support@browriters.com" class="text-blue-500">support@browriters.com</a> with your order details.</li>
          <li>We will review your request and provide return instructions.</li>
          <li>Ship the product to our return address within 3 days of approval.</li>
        </ol>
  
        <h2 class="text-xl font-semibold">4. Refund Process</h2>
        <ul class="list-disc pl-6">
          <li>Once we receive the returned product, we will inspect it.</li>
          <li>Refunds are processed within **5-7 business days** after approval.</li>
          <li>Refunds will be credited to the original payment method (PhonePe, UPI, or bank transfer).</li>
        </ul>
  
        <h2 class="text-xl font-semibold">5. Damaged or Incorrect Products</h2>
        <p>If you receive a defective, damaged, or incorrect product, please **contact us within 48 hours** of delivery with images of the item.</p>
  
        <h2 class="text-xl font-semibold">6. Cancellation Policy</h2>
        <p>Orders can be canceled within **24 hours** of placement. Once shipped, cancellations are not possible.</p>
  
        <h2 class="text-xl font-semibold">7. Contact Us</h2>
        <p>For any return or refund queries, email us at <a href="mailto:support@browriters.com" class="text-blue-500">support@browriters.com</a>.</p>
      </div>
    </div>
  </template>
  
  <script setup>
  </script>
  
  <style scoped>
  ul, ol {
    margin-left: 1rem;
  }
  </style>
  