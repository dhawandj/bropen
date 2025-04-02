<script setup>
import { ref } from "vue";
import axios from "axios";

const amount = ref(100);
const mobileNumber = ref("");
const isLoading = ref(false);

const initiatePayment = async () => {
  isLoading.value = true;

  try {
    const response = await axios.post("/initiate-payment", {
      amount: amount.value,
      mobile_number: mobileNumber.value
    });

    if (response.data.success) {
      window.location.href = response.data.redirect_url; // Redirect to PhonePe
    } else {
      alert("Payment failed. Please try again.");
    }
  } catch (error) {
    alert("An error occurred. Please try again.");
  } finally {
    isLoading.value = false;
  }
};
</script>

<template>
  <div class="max-w-md mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-xl font-semibold mb-4">PhonePe Payment</h2>

    <div class="mb-4">
      <label class="block font-medium">Amount (INR)</label>
      <input v-model="amount" type="number" class="w-full px-4 py-2 border rounded" />
    </div>

    <div class="mb-4">
      <label class="block font-medium">Mobile Number</label>
      <input v-model="mobileNumber" type="text" class="w-full px-4 py-2 border rounded" />
    </div>

    <button
      @click="initiatePayment"
      :disabled="isLoading"
      class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
    >
      {{ isLoading ? "Processing..." : "Pay Now" }}
    </button>
  </div>
</template>
